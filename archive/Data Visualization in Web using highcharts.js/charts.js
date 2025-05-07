

function hashtag_open_content_open(date, step1, step2, value, value3){
Highcharts.chart('hashtag_open_content_open', {
        chart: {
        // backgroundColor: '#FCFFC5',
        zoomType: 'xy',
                borderColor: '#f3f3f3',
                borderWidth: 2,
                spacingTop: 24,
                                spacingBottom: 10,


    },
       legend: {
        align: 'center',
        verticalAlign: 'top',
        layout: 'horizontal',
        x: 0,
        y: 0
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Hashtag Open → Content Open',
                align: 'left',
        x: 70
    },
    subtitle: {
        text: ' '
    },
    xAxis: [{
categories: date,
        crosshair: true,
 plotOptions: {
            series: {
                pointWidth: 20,
            }
        }
  }
    ],
    yAxis: [{ // Primary yAxis
        labels: {
                formatter: function() {
                    var ret,
                        numericSymbols = ['k', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.value >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.value >= multi && numericSymbols[i] !== null) {
                                ret = (this.value / multi) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? ret : this.value);
                },
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Content Open',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, 
     { // Secondary yAxis
        title: {
            text: 'Conversion Rate',

        },
        labels: {
            format: '{value}%',
        },
        opposite: true
    }],
    tooltip: {
        shared: true

    },
    // legend: {
    //     layout: 'horizontal',
    //     align: 'center',
    //     verticalAlign: 'top',
    //     floating: true,
    //     visible: false,
    //     backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    // },
    series: [{
        name: 'Hashtag Page Open',
        type: 'column',
        data: step1,
                color:  '#44c8ca',
                                tooltip: {
            pointFormatter: 
             function() {
                    var ret,
                        numericSymbols = ['K', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.y >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.y >= multi && numericSymbols[i] !== null) {
                                ret = (Math.round(this.y / multi)) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+ret+'<br />' :  ' <b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'<br />');
                },
        }


    }, 
{
        name: 'Content Open',
        type: 'column',
        data: step2,
                color:  '#F4625F',
                                tooltip: {
            pointFormatter: 
             function() {
                    var ret,
                        numericSymbols = ['K', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.y >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.y >= multi && numericSymbols[i] !== null) {
                                ret = (Math.round(this.y / multi)) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+ret+'<br />' :  ' <b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'<br />');
                },
        }


    },

    {
        name: 'Hashtag Open → Content Open',
        type: 'spline',
                yAxis: 1,
        data:  value,
        color:  '#eeda41',
                              tooltip: {
            pointFormatter: function () {
                return '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'%';
            }},

    }, 

    ]
});

};



function hashtag_action(date, step1, value)
{
Highcharts.chart('hashtag_action', {
        chart: {
        // backgroundColor: '#FCFFC5',
        zoomType: 'xy',
                borderColor: '#f3f3f3',
                borderWidth: 2,
                spacingTop: 24,
                                spacingBottom: 10,


    },
       legend: {
        align: 'center',
        verticalAlign: 'top',
        layout: 'horizontal',
        x: 0,
        y: 0
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Hashtag Action',
                align: 'left',
        x: 70
    },
    subtitle: {
        text: '*Hachtag Action includes taps on the CTA or Banner',
        align: 'left',
                x: 70

    },
    xAxis: [{
categories: date,
        crosshair: true,
 plotOptions: {
            series: {
                pointWidth: 20,
            }
        }
  }
    ],
    yAxis: [{ // Primary yAxis
        labels: {
                formatter: function() {
                    var ret,
                        numericSymbols = ['k', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.value >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.value >= multi && numericSymbols[i] !== null) {
                                ret = (this.value / multi) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? ret : this.value);
                },
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Content Open',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, 
     { // Secondary yAxis
        title: {
            text: 'Conversion Rate',

        },
        labels: {
            format: '{value}%',
        },
        opposite: true
    } 
    ],
    tooltip: {
        shared: true

    },
    // legend: {
    //     layout: 'horizontal',
    //     align: 'center',
    //     verticalAlign: 'top',
    //     floating: true,
    //     visible: false,
    //     backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    // },
    series: [
{
        name: 'Hashtag Action',
        type: 'column',
        data: step1,
                color:  '#FFBB46',
                                tooltip: {
            pointFormatter: 
             function() {
                    var ret,
                        numericSymbols = ['K', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.y >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.y >= multi && numericSymbols[i] !== null) {
                                ret = (Math.round(this.y / multi)) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+ret+'<br />' :  ' <b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'<br />');
                },
        }


    },
     {
        name: 'Hashtag Open →  Hashtag Action',
        type: 'spline',
                yAxis: 1,
        data:  value,
        color:  '#44c8ca',
                              tooltip: {
            pointFormatter: function () {
                return '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'%';
            }},

    },  


    ]
});

};



function hashtag_open_ed(date, step1, value)
{
Highcharts.chart('hashtag_open_ed', {
        chart: {
        // backgroundColor: '#FCFFC5',
        zoomType: 'xy',
                borderColor: '#f3f3f3',
                borderWidth: 2,
                spacingTop: 24,
                                spacingBottom: 10,


    },
       legend: {
        align: 'center',
        verticalAlign: 'top',
        layout: 'horizontal',
        x: 0,
        y: 0
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Hashtag Open → ED',
                align: 'left',
        x: 70
    },
    subtitle: {
        text: ' ',
        align: 'left',
                x: 70

    },
    xAxis: [{
categories: date,
        crosshair: true,
 plotOptions: {
            series: {
                pointWidth: 20,
            }
        }
  }
    ],
    yAxis: [{ // Primary yAxis
        labels: {
                formatter: function() {
                    var ret,
                        numericSymbols = ['k', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.value >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.value >= multi && numericSymbols[i] !== null) {
                                ret = (this.value / multi) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? ret : this.value);
                },
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Content Open',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, 
     { // Secondary yAxis
        title: {
            text: 'Conversion Rate',

        },
        labels: {
            format: '{value}%',
        },
        opposite: true
    }],
    tooltip: {
        shared: true

    },
    // legend: {
    //     layout: 'horizontal',
    //     align: 'center',
    //     verticalAlign: 'top',
    //     floating: true,
    //     visible: false,
    //     backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    // },
    series: [{
        name: 'ED from Hashtags',
        type: 'column',
        data: step1,
                color:  '#e20067',
                                tooltip: {
            pointFormatter: 
             function() {
                    var ret,
                        numericSymbols = ['K', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.y >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.y >= multi && numericSymbols[i] !== null) {
                                ret = (Math.round(this.y / multi)) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+ret+'<br />' :  ' <b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'<br />');
                },
        }


    }, 
    {
        name: 'Hashtag Open --> ED',
        type: 'spline',
                yAxis: 1,
        data:  value,
        color:  '#309fab',
                              tooltip: {
            pointFormatter: function () {
                return '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y;
            }},

    }, 

    ]
});

};



function hashtag_follow(date, step1, value){
Highcharts.chart('hashtag_follow', {
        chart: {
        // backgroundColor: '#FCFFC5',
        zoomType: 'xy',
                borderColor: '#f3f3f3',
                borderWidth: 2,
                spacingTop: 24,
                                spacingBottom: 10,


    },
       legend: {
        align: 'center',
        verticalAlign: 'top',
        layout: 'horizontal',
        x: 0,
        y: 0
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'Tag Favorite (Tag Follow)',
                align: 'left',
        x: 70
    },
    subtitle: {
        text: ' '
    },
    xAxis: [{
categories: date,
        crosshair: true,
 plotOptions: {
            series: {
                pointWidth: 20,
            }
        }
  }
    ],
    yAxis: [{ // Primary yAxis
        labels: {
                formatter: function() {
                    var ret,
                        numericSymbols = ['k', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.value >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.value >= multi && numericSymbols[i] !== null) {
                                ret = (this.value / multi) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? ret : this.value);
                },
            format: '{value}',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        title: {
            text: 'Tag Favorite ',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    },
    { // Secondary yAxis
        title: {
            text: 'Conversion Rate',

        },
        labels: {
            format: '{value}%',
        },
        opposite: true
    }],
    tooltip: {
        shared: true

    },

    // legend: {
    //     layout: 'horizontal',
    //     align: 'center',
    //     verticalAlign: 'top',
    //     floating: true,
    //     visible: false,
    //     backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    // },
    series: [{
        name: 'Tag Favorite',
        type: 'column',
        data: step1,
                color:  '#003063',
                                tooltip: {
            pointFormatter: 
             function() {
                    var ret,
                        numericSymbols = ['K', 'M', 'G', 'T', 'P', 'E'],
                        i = 6;
                    if(this.y >=1000) {
                        while (i-- && ret === undefined) {
                            multi = Math.pow(1000, i + 1);
                            if (this.y >= multi && numericSymbols[i] !== null) {
                                ret = (Math.round(this.y / multi)) + numericSymbols[i];
                            }
                        }
                    }
                    return (ret ? '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+ret+'<br />' :  ' <b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'<br />');
                },
        }


    },
        {
        name: 'Hashtag Open →  Tag Favorite',
        type: 'spline',
                yAxis: 1,
        data:  value,
        color:  '#e20067',
                              tooltip: {
            pointFormatter: function () {
                return '<b>'+'<br/><span style="color:' 
             + this.series.color
             + '">\u25CF</span> '+' <b>'+this.series.name+':</b> '+this.y+'%';
            }},

    },  

    ]
});

};

