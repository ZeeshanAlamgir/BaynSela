$(window).on("load", (function () {
    "use strict";
    var o, e, r, t, a, s, i, l, n, d, h, c = "#f3f3f3",
        w = "#EBEBEB",
        p = "#b9b9c3",
        u = document.querySelector("#statistics-order-chart"),
        g = document.querySelector("#statistics-profit-chart"),
        b = document.querySelector("#earnings-chart"),
        y = document.querySelector("#revenue-report-chart"),
        m = document.querySelector("#budget-chart"),
        f = document.querySelector("#browser-state-chart-primary"),
        k = document.querySelector("#browser-state-chart-warning"),
        x = document.querySelector("#browser-state-chart-secondary"),
        C = document.querySelector("#browser-state-chart-info"),
        A = document.querySelector("#browser-state-chart-danger"),
        B = document.querySelector("#goal-overview-radial-bar-chart"),
        S = "rtl" === $("html").attr("data-textdirection");
    setTimeout((function () {
        // toastr.success("You have successfully logged in to Vuexy. Now you can start to explore!", "👋 Welcome John Doe!", {
        //     closeButton: !0,
        //     tapToDismiss: !1,
        //     rtl: S
        // })
    }), 2e3), o = {
        chart: {
            height: 70,
            type: "bar",
            stacked: !0,
            toolbar: {
                show: !1
            }
        },
        grid: {
            show: !1,
            padding: {
                left: 0,
                right: 0,
                top: -15,
                bottom: -15
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%",
                startingShape: "rounded",
                colors: {
                    backgroundBarColors: [c, c, c, c, c],
                    backgroundBarRadius: 5
                }
            }
        },
        legend: {
            show: !1
        },
        dataLabels: {
            enabled: !1
        },
        colors: [window.colors.solid.warning],
        series: [{
            name: "2020",
            data: [45, 85, 65, 45, 65]
        }],
        xaxis: {
            labels: {
                show: !1
            },
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            }
        },
        yaxis: {
            show: !1
        },
        tooltip: {
            x: {
                show: !1
            }
        }
    }, new ApexCharts(u, o).render(), e = {
        chart: {
            height: 70,
            type: "line",
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            }
        },
        grid: {
            borderColor: w,
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: !0
                }
            },
            yaxis: {
                lines: {
                    show: !1
                }
            },
            padding: {
                top: -30,
                bottom: -10
            }
        },
        stroke: {
            width: 3
        },
        colors: [window.colors.solid.info],
        series: [{
            data: [0, 20, 5, 30, 15, 45]
        }],
        markers: {
            size: 2,
            colors: window.colors.solid.info,
            strokeColors: window.colors.solid.info,
            strokeWidth: 2,
            strokeOpacity: 1,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [{
                seriesIndex: 0,
                dataPointIndex: 5,
                fillColor: "#ffffff",
                strokeColor: window.colors.solid.info,
                size: 5
            }],
            shape: "circle",
            radius: 2,
            hover: {
                size: 3
            }
        },
        xaxis: {
            labels: {
                show: !0,
                style: {
                    fontSize: "0px"
                }
            },
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            }
        },
        yaxis: {
            show: !1
        },
        tooltip: {
            x: {
                show: !1
            }
        }
    }, new ApexCharts(g, e).render(), r = {
        chart: {
            type: "donut",
            height: 120,
            toolbar: {
                show: !1
            }
        },
        dataLabels: {
            enabled: !1
        },
        series: [53, 16, 31],
        legend: {
            show: !1
        },
        comparedResult: [2, -3, 8],
        labels: ["App", "Service", "Product"],
        stroke: {
            width: 0
        },
        colors: ["#28c76f66", "#28c76f33", window.colors.solid.success],
        grid: {
            padding: {
                right: -20,
                bottom: -8,
                left: -20
            }
        },
        plotOptions: {
            pie: {
                startAngle: -10,
                donut: {
                    labels: {
                        show: !0,
                        name: {
                            offsetY: 15
                        },
                        value: {
                            offsetY: -15,
                            formatter: function (o) {
                                return parseInt(o) + "%"
                            }
                        },
                        total: {
                            show: !0,
                            offsetY: 15,
                            label: "App",
                            formatter: function (o) {
                                return "53%"
                            }
                        }
                    }
                }
            }
        },
        responsive: [{
            breakpoint: 1325,
            options: {
                chart: {
                    height: 100
                }
            }
        }, {
            breakpoint: 1200,
            options: {
                chart: {
                    height: 120
                }
            }
        }, {
            breakpoint: 1045,
            options: {
                chart: {
                    height: 100
                }
            }
        }, {
            breakpoint: 992,
            options: {
                chart: {
                    height: 120
                }
            }
        }]
    }, new ApexCharts(b, r).render(), t = {
        chart: {
            height: 230,
            stacked: !0,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                columnWidth: "17%",
                endingShape: "rounded"
            },
            distributed: !0
        },
        colors: [window.colors.solid.primary, window.colors.solid.warning],
        series: [{
            name: "Earning",
            data: [95, 177, 284, 256, 105, 63, 168, 218, 72]
        }, {
            name: "Expense",
            data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
        }],
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: !1
        },
        grid: {
            padding: {
                top: -20,
                bottom: -10
            },
            yaxis: {
                lines: {
                    show: !1
                }
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            labels: {
                style: {
                    colors: p,
                    fontSize: "0.86rem"
                }
            },
            axisTicks: {
                show: !1
            },
            axisBorder: {
                show: !1
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: p,
                    fontSize: "0.86rem"
                }
            }
        }
    }, new ApexCharts(y, t).render(), a = {
        chart: {
            height: 80,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            type: "line",
            sparkline: {
                enabled: !0
            }
        },
        stroke: {
            curve: "smooth",
            dashArray: [0, 5],
            width: [2]
        },
        colors: [window.colors.solid.primary, "#dcdae3"],
        series: [{
            data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
        }, {
            data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
        }],
        tooltip: {
            enabled: !1
        }
    }, new ApexCharts(m, a).render(), s = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.primary],
        series: [54.4],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(f, s).render(), i = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.warning],
        series: [6.1],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(k, i).render(), l = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.secondary],
        series: [14.6],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(x, l).render(), n = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.info],
        series: [4.2],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(C, n).render(), d = {
        chart: {
            height: 30,
            width: 30,
            type: "radialBar"
        },
        grid: {
            show: !1,
            padding: {
                left: -15,
                right: -15,
                top: -12,
                bottom: -15
            }
        },
        colors: [window.colors.solid.danger],
        series: [8.4],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "22%"
                },
                track: {
                    background: w
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        show: !1
                    },
                    value: {
                        show: !1
                    }
                }
            }
        },
        stroke: {
            lineCap: "round"
        }
    }, new ApexCharts(A, d).render(), h = {
        chart: {
            height: 245,
            type: "radialBar",
            sparkline: {
                enabled: !0
            },
            dropShadow: {
                enabled: !0,
                blur: 3,
                left: 1,
                top: 1,
                opacity: .1
            }
        },
        colors: ["#51e5a8"],
        plotOptions: {
            radialBar: {
                offsetY: -10,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: "77%"
                },
                track: {
                    background: "#ebe9f1",
                    strokeWidth: "50%"
                },
                dataLabels: {
                    name: {
                        show: !1
                    },
                    value: {
                        color: "#5e5873",
                        fontSize: "2.86rem",
                        fontWeight: "600"
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: [window.colors.solid.success],
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        series: [83],
        stroke: {
            lineCap: "round"
        },
        grid: {
            padding: {
                bottom: 30
            }
        }
    }, new ApexCharts(B, h).render()
}));
