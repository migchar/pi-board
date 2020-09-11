/*!
 * Pi Board
 * Copyright 2020 migchar.com.
 * Licensed under the GPL v3.0 license.
 */
$(document).ready(function () {
    var cpuProgress = document.getElementById("cpu-progress");
    var memProgress = document.getElementById("mem-progress");

    setInterval(function () {

        $.getJSON('?ajax=true', function (data) {
            var newDate = new Date();
            newDate.setTime(parseInt(data.time) * 1000);

            $("#time").text(newDate.toLocaleTimeString('chinese', {hour12: false}));
            $("#date").text(newDate.toLocaleDateString());
            $("#uptime").text(uptimeFormat(data.uptime));
            $("#cpu-temp").text(Math.round(data.cpu.temp / 1000 * Math.pow(10, 1)) / Math.pow(10, 1));

            memProgress.setAttribute('style', 'width:' + data.mem.percent + '%')
            $("#mem-percent").text(data.mem.percent);
            $("#mem-free").text(data.mem.free);
            $("#mem-cached").text(data.mem.cached);
            $("#mem-swap-total").text(data.mem.swap.total);
            $("#mem-cache-percent").text(data.mem.cached_percent);
            $("#mem-buffers").text(data.mem.buffers);
            $("#mem-real-percent").text(data.mem.real.percent);
            $("#mem-real-free").text(data.mem.real.free);
            $("#mem-swap-percent").text(data.mem.swap.percent);
            $("#mem-swap-free").text(data.mem.swap.free);
            $("#disk-percent").text(data.disk.percent);
            $("#disk-total").text(data.disk.total);
            $("#disk-free").text(data.disk.free);
            $("#loadavg-1m").text(data.load_avg[0]);
            $("#loadavg-5m").text(data.load_avg[1]);
            $("#loadavg-10m").text(data.load_avg[2]);
            $("#loadavg-running").text(data.load_avg[3].split("/")[0]);
            $("#loadavg-threads").text(data.load_avg[3].split("/")[1]);


            for (i = 0; i < data.net.count; i++) {
                $("#net-interface-" + (i + 1) + "-total-in").text(bytesRound(parseInt(data.net.interfaces[i].total_in), 2));
                $("#net-interface-" + (i + 1) + "-total-out").text(bytesRound(parseInt(data.net.interfaces[i].total_out), 2));
            }

            if (window.dashboard != null) {
                window.dashboard_old = window.dashboard;
            }

            window.dashboard = data;

        });


        if (window.dashboard != null) {
            if (window.dashboard_old != null) {
                if (window.dashboard_old.net.count > 0) {
                    for (i = 0; i < window.dashboard_old.net.count; i++) {
                        $("#net-interface-" + (i + 1) + "-up").text(bytesRound(parseInt(window.dashboard.net.interfaces[i].total_out) - parseInt(window.dashboard_old.net.interfaces[i].total_out), 1));
                        $("#net-interface-" + (i + 1) + "-down").text(bytesRound(parseInt(window.dashboard.net.interfaces[i].total_in) - parseInt(window.dashboard_old.net.interfaces[i].total_in), 1));
                    }
                }

                idle_diff = parseInt(window.dashboard.cpu.stat.idle) - parseInt(window.dashboard_old.cpu.stat.idle);
                used_total = parseInt(window.dashboard.cpu.stat.idle) +
                    parseInt(window.dashboard.cpu.stat.user) +
                    parseInt(window.dashboard.cpu.stat.sys) +
                    parseInt(window.dashboard.cpu.stat.nice) +
                    parseInt(window.dashboard.cpu.stat.iowait) +
                    parseInt(window.dashboard.cpu.stat.irq) +
                    parseInt(window.dashboard.cpu.stat.softirq) -
                    parseInt(window.dashboard_old.cpu.stat.idle) -
                    parseInt(window.dashboard_old.cpu.stat.user) -
                    parseInt(window.dashboard_old.cpu.stat.sys) -
                    parseInt(window.dashboard_old.cpu.stat.nice) -
                    parseInt(window.dashboard_old.cpu.stat.iowait) -
                    parseInt(window.dashboard_old.cpu.stat.irq) -
                    parseInt(window.dashboard_old.cpu.stat.softirq);

                cpuProgress.setAttribute('style', 'width:' + Math.round((1.0 - (idle_diff / used_total)) * 100 * Math.pow(10, 1)) / Math.pow(10, 1) + '%')
                $("#container-cpu").text(Math.round((1.0 - (idle_diff / used_total)) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#container-mem").text(Math.round(window.dashboard.mem.used));
                $('#container-swap').text(window.dashboard.mem.swap.used)

                $("#cpu-freq").text(window.dashboard.cpu.freq / 1000);
                $("#cpu-stat-idl").text(Math.round(((parseInt(window.dashboard.cpu.stat.idle) - parseInt(window.dashboard_old.cpu.stat.idle)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-use").text(Math.round(((parseInt(window.dashboard.cpu.stat.user) - parseInt(window.dashboard_old.cpu.stat.user)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-sys").text(Math.round(((parseInt(window.dashboard.cpu.stat.sys) - parseInt(window.dashboard_old.cpu.stat.sys)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-nic").text(Math.round(((parseInt(window.dashboard.cpu.stat.nice) - parseInt(window.dashboard_old.cpu.stat.nice)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-iow").text(Math.round(((parseInt(window.dashboard.cpu.stat.iowait) - parseInt(window.dashboard_old.cpu.stat.iowait)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-irq").text(Math.round(((parseInt(window.dashboard.cpu.stat.irq) - parseInt(window.dashboard_old.cpu.stat.irq)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
                $("#cpu-stat-sirq").text(Math.round(((parseInt(window.dashboard.cpu.stat.softirq) - parseInt(window.dashboard_old.cpu.stat.softirq)) / used_total) * 100 * Math.pow(10, 1)) / Math.pow(10, 1));
            }
        }
    }, 1000);


    function bytesRound(number, round) {
        if (number < 0) {
            var last = 0 + "B";
        } else if (number < 1024) {
            //var last=Math.round(number*Math.pow(10,round))/Math.pow(10,round)+"B";
            var last = number + "B";
        } else if (number < 1048576) {
            number = number / 1024;
            var last = Math.round(number * Math.pow(10, round)) / Math.pow(10, round) + "K";
        } else if (number < 1048576000) {
            number = number / 1048576;
            var last = Math.round(number * Math.pow(10, round)) / Math.pow(10, round) + "M";
        } else {
            number = number / 1048576000;
            var last = Math.round(number * Math.pow(10, round)) / Math.pow(10, round) + "G";
        }
        return last;
    }


    Date.prototype.format = function (format) {
        var date = {
            "M+": this.getMonth() + 1,
            "d+": this.getDate(),
            "h+": this.getHours(),
            "m+": this.getMinutes(),
            "s+": this.getSeconds(),
            "q+": Math.floor((this.getMonth() + 3) / 3),
            "S+": this.getMilliseconds()
        };
        if (/(y+)/i.test(format)) {
            format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
        }
        for (var k in date) {
            if (new RegExp("(" + k + ")").test(format)) {
                format = format.replace(RegExp.$1, RegExp.$1.length == 1
                    ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
            }
        }
        return format;
    }


    function uptimeFormat(str) {
        var uptime = "";
        var min = parseInt(str) / 60;
        var hours = min / 60;
        var days = Math.floor(hours / 24);
        var hours = Math.floor(hours - (days * 24));
        min = Math.floor(min - (days * 60 * 24) - (hours * 60));

        if (days !== 0) {
            if (days == 1) {
                uptime = days + " day ";
            } else {
                uptime = days + " days ";
            }
        }
        if (hours !== 0) {
            uptime = uptime + hours + ":";
        }

        return uptime = uptime + min;
    }

    $('#hostBtn').click(function (event) {
        if ($('#hostPage').hasClass("closed")) {
            $('#hostPage').removeClass("closed");
        } else {
            $('#hostPage').addClass("closed");
        }
    });

})
