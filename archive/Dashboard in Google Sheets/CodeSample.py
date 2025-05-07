
from datetime import datetime,timedelta,date
import httplib2
import os
from apiclient import discovery
from oauth2client import client
from oauth2client import tools
from oauth2client.file import Storage
import pandas as pd
import numpy as np
import time
import json
import pygsheets
import sqlalchemy
import psycopg2
# from __future__ import print_function

# client_secret_951091828896-bpp7jom2aufb03cvpu5lqqnsps74q7i9.apps.googleusercontent.com
gc = pygsheets.authorize(outh_file='/Users/nanedadayan/client_secret_8.json')
query1="Select * from public.searched_clicked_all_expanded_sources"
from sqlalchemy import create_engine
engine = create_engine('postgresql://user:user@192.168.0.0:12345/user')
df_searches_sources_1 = pd.DataFrame(pd.read_sql_query(query1,con=engine))
df_searches_sources = pd.DataFrame(pd.read_sql_query(query1,con=engine))
df_searches_sources=df_searches_sources[df_searches_sources["date1"]=="2018-01-01"]
df_searches_sources= df_searches_sources[df_searches_sources["source"]!="all_sources"]
df__calc=df_searches_sources[df_searches_sources["source"]!="all_sources"]
df__calc=df_searches_sources[["search_key","searches"]].groupby("search_key").sum()
df__calc["Calc"]=df__calc["searches"]
df__calc=df__calc.drop("searches",axis=1)
df_joined_calc=df_searches_sources.join(df__calc, on="search_key", how='inner', sort=True)
df_joined_calc["perc_sources"]=df_joined_calc["searches"]/df_joined_calc["Calc"]
df_joined_calc=df_joined_calc[df_joined_calc["date1"]=="2018-01-01"]
df_joined_calc=df_joined_calc.pivot(index="search_key",columns="source", values="perc_sources").fillna(0)
df_joined_calc=df_joined_calc[["add_photo","create_editor","editor","home_search","sticker_search"]]

# # df_dates=df_searches_sources[df_searches_sources["date1"]=="2018-01-01"]
df_dates=df_searches_sources_1[df_searches_sources_1["source"]=="all_sources"]
df_dates=df_dates[["search_key","searches","clicks","date1"]]
df_dates["ctr"]=df_dates["clicks"]/df_dates["searches"]
df_dates["date1"]=df_dates['date1'].str[0:11]
df_dates=df_dates[["search_key","date1","ctr"]].pivot(index="search_key",columns="date1", values="ctr").fillna(0)
df_full=df_joined_calc.join(df_dates, how='inner', sort=True)
df_searches_sources_2=df_searches_sources_1[df_searches_sources_1["date1"]=="2018-01-01"]
df_searches_sources_2=df_searches_sources_2[df_searches_sources_2["source"]=="all_sources"]
df_searches_sources_2=df_searches_sources_2[["search_key","searches","clicks"]]
# df_searches_sources_2=df_searches_sources_2.drop_duplicates(keep='first', inplace=False)
last_df=df_searches_sources_2.join(df_full, on='search_key',how='inner', sort=True)
# df_searches_sources_2.sort_values(["search_key"],ascending=False, na_position='first')
# df_searches_sources_2
# search_key	searches	clicks	add_photo	create_editor	editor	home_search	sticker_search	2018-01-01
last_df=last_df.rename(index=str, columns={"search_key": "Searched Key", "searches": "Searched",  "clicks": "Clicked", "add_photo": "Add Photo", "create_editor": "Photo Chooser", "editor": "Sticker Search","home_search": "Explore Search","sticker_search": "Sticker Search (as an old source)","2018-01-01": "Overall CTR"}).sort_values(by=['Searched'], ascending=False)
sh = gc.open('Search Dashboards')
wks=sh.worksheet_by_title("CTR with keywords")
wks.set_dataframe(last_df, 'B4',copy_index=False, copy_head=True, fit=False)

