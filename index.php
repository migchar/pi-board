<?php require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sys.php'); ?>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <title>Pi Board</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/mdb.min.css" rel="stylesheet">
    <link href="assets/board.css" rel="stylesheet">
    <script src="assets/jquery-3.1.1.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/font/iconfont.js"></script>
</head>
<body>
<nav class="container nav-bar side-padding">
    <h1 class="nav-header"><a href="" class="nav-text"><img
                    src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IS0tR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMi4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApLS0+PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ5Mi40IDYxOS41IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0OTIuNCA2MTkuNSIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGc+PHBhdGggZmlsbD0iIzAyMDIwMyIgZD0iTTEzMy4zLDBjLTMuMiwwLjEtNi42LDEuNS0xMC41LDQuNWMtOS41LTMuNi0xOC43LTQuOS0yNywyLjVjLTEyLjctMS42LTE2LjksMS43LTIwLDUuNwoJCQlDNzMsMTIuNiw1NC45LDkuOCw0Ni42LDIyYy0yMC45LTIuNC0yNy41LDEyLjEtMjAsMjUuN2MtNC4zLDYuNS04LjcsMTIuOSwxLjMsMjUuM2MtMy41LDYuOS0xLjMsMTQuNCw3LDIzLjUKCQkJYy0yLjIsOS43LDIuMSwxNi42LDkuOSwyMS45Yy0xLjQsMTMuMywxMi40LDIxLDE2LjUsMjMuOGMxLjYsNy43LDQuOSwxNSwyMC43LDE5LjFjMi42LDExLjUsMTIuMSwxMy41LDIxLjMsMTYKCQkJYy0zMC40LDE3LjQtNTYuNCw0MC4zLTU2LjIsOTYuNGwtNC40LDcuOGMtMzQuOCwyMC45LTY2LjEsODcuOS0xNy4yLDE0Mi40YzMuMiwxNy4xLDguNiwyOS4zLDEzLjMsNDIuOQoJCQljNy4xLDU0LjYsNTMuOCw4MC4yLDY2LjEsODMuMmMxOCwxMy41LDM3LjIsMjYuNCw2My4yLDM1LjNjMjQuNSwyNC45LDUxLDM0LjQsNzcuNywzNC4zYzAuNCwwLDAuOCwwLDEuMiwwCgkJCWMyNi43LDAsNTMuMi05LjUsNzcuNy0zNC4zYzI2LTksNDUuMi0yMS44LDYzLjItMzUuM2MxMi4zLTMsNTguOS0yOC42LDY2LjEtODMuMmM0LjgtMTMuNiwxMC4xLTI1LjgsMTMuMy00Mi45CgkJCWM0OS01NC41LDE3LjctMTIxLjUtMTcuMi0xNDIuNGwtNC41LTcuOGMwLjItNTYuMS0yNS45LTc5LTU2LjItOTYuNGM5LjItMi40LDE4LjctNC40LDIxLjMtMTZjMTUuOC00LDE5LjEtMTEuMywyMC43LTE5LjEKCQkJYzQuMS0yLjgsMTcuOS0xMC41LDE2LjUtMjMuOGM3LjctNS4zLDEyLTEyLjIsOS45LTIxLjljOC4zLTkuMSwxMC41LTE2LjYsNy0yMy41YzEwLTEyLjQsNS42LTE4LjgsMS4zLTI1LjMKCQkJYzcuNS0xMy42LDAuOS0yOC4xLTIwLTI1LjdjLTguMy0xMi4yLTI2LjQtOS40LTI5LjItOS40Yy0zLjEtMy45LTcuMy03LjMtMjAtNS43Yy04LjItNy40LTE3LjUtNi4xLTI3LTIuNQoJCQljLTExLjMtOC44LTE4LjgtMS43LTI3LjMsMC45QzMyOC42LDEsMzI1LjQsNywzMTguNyw5LjVjLTE0LjktMy4xLTE5LjUsMy43LTI2LjYsMTAuOGwtMC41LTAuMmMtMi41LTEuMi01LjMtMS4xLTcuOCwwLjF2MAoJCQljLTIyLjUsMTMuMS0zMy43LDM5LjctMzcuNiw1My4zYy00LTEzLjctMTUuMS00MC4zLTM3LjYtNTMuM2wtMC40LTAuMmMtMi41LTEuMS01LjQtMS03LjgsMC4zbC0wLjEsMC4xCgkJCWMtNy4yLTcuMS0xMS43LTEzLjktMjYuNi0xMC44Yy02LjctMi41LTkuOC04LjUtMjMuNS00LjFjLTUuNi0xLjctOC45LTUuNi0xNS01LjRMMTMzLjMsMHoiLz48L2c+PHBhdGggZmlsbD0iIzZBQkY0QiIgZD0iTTg4LjksNTcuN2M1OS43LDMwLjMsOTQuNCw1NC44LDExMy40LDc1LjdjLTkuNywzOC40LTYwLjUsNDAuMi03OS4xLDM5LjFjMy44LTEuNyw3LTMuOCw4LjEtNwoJCWMtNC43LTMuMy0yMS4yLTAuMy0zMi43LTYuN2M0LjQtMC45LDYuNS0xLjgsOC42LTVjLTEwLjktMy40LTIyLjYtNi40LTI5LjUtMTJjMy43LDAsNy4yLDAuOCwxMi4xLTIuNUM4MCwxMzQsNjkuNiwxMjkuOSw2MS41LDEyMgoJCWM1LTAuMSwxMC41LDAsMTIuMS0xLjljLTguOS01LjUtMTYuNS0xMS41LTIyLjctMTguMWM3LjEsMC44LDEwLDAuMSwxMS44LTEuMWMtNi44LTYuOC0xNS4zLTEyLjYtMTkuNC0yMWM1LjIsMS44LDEwLDIuNSwxMy41LTAuMgoJCWMtMi4zLTUuMS0xMi4xLTguMS0xNy44LTIwYzUuNSwwLjUsMTEuNCwxLjIsMTIuNSwwYy0yLjYtMTAuMy03LTE2LjEtMTEuMy0yMi4xYzExLjgtMC4yLDI5LjcsMCwyOC45LTAuOWwtNy4zLTcuNAoJCWMxMS41LTMuMSwyMy4zLDAuNSwzMS45LDMuMWMzLjgtMy0wLjEtNi44LTQuOC0xMC42YzkuOCwxLjMsMTguNywzLjUsMjYuNyw2LjZjNC4zLTMuOC0yLjgtNy42LTYuMi0xMS40CgkJYzE1LjIsMi44LDIxLjYsNi44LDI4LDEwLjhjNC42LTQuNCwwLjMtOC4xLTIuOS0xMS45YzExLjQsNC4yLDE3LjMsOS41LDIzLjUsMTQuOWMyLjEtMi44LDUuMy00LjgsMS40LTExLjYKCQljOC4xLDQuNiwxNC4yLDEwLDE4LjcsMTYuMWM1LTMuMSwzLTcuNSwzLTExLjRjOC40LDYuOCwxMy44LDEzLjksMjAuMywyMWMxLjMtMC45LDIuNS00LjIsMy41LTkuMmMyMC4xLDE5LjIsNDguNSw2Ny42LDcuMyw4Ni44CgkJQzE3Ny4zLDkzLjksMTM1LjQsNzMuMiw4OC45LDU3LjdMODguOSw1Ny43eiIvPjxwYXRoIGZpbGw9IiM2QUJGNEIiIGQ9Ik00MDUuMSw1Ny43Yy01OS43LDMwLjMtOTQuNCw1NC44LTExMy40LDc1LjdjOS43LDM4LjQsNjAuNSw0MC4yLDc5LjEsMzkuMWMtMy44LTEuNy03LTMuOC04LjEtNwoJCWM0LjctMy4zLDIxLjItMC4zLDMyLjctNi43Yy00LjQtMC45LTYuNS0xLjgtOC42LTVjMTAuOS0zLjQsMjIuNi02LjQsMjkuNS0xMmMtMy43LDAtNy4yLDAuOC0xMi4xLTIuNWM5LjgtNS4yLDIwLjItOS4zLDI4LjMtMTcuMgoJCWMtNS0wLjEtMTAuNSwwLTEyLjEtMS45YzguOS01LjUsMTYuNS0xMS41LDIyLjctMTguMWMtNy4xLDAuOC0xMCwwLjEtMTEuOC0xLjFjNi44LTYuOCwxNS4zLTEyLjYsMTkuNC0yMQoJCWMtNS4yLDEuOC0xMCwyLjUtMTMuNS0wLjJjMi4zLTUuMSwxMi4xLTguMSwxNy44LTIwYy01LjUsMC41LTExLjQsMS4yLTEyLjUsMGMyLjYtMTAuMyw3LTE2LjEsMTEuMy0yMi4xCgkJYy0xMS44LTAuMi0yOS43LDAtMjguOS0wLjlsNy4zLTcuNGMtMTEuNS0zLjEtMjMuNCwwLjUtMzEuOSwzLjFjLTMuOC0zLDAuMS02LjgsNC44LTEwLjZjLTkuOCwxLjMtMTguNywzLjUtMjYuNyw2LjYKCQljLTQuMy0zLjgsMi44LTcuNiw2LjItMTEuNGMtMTUuMiwyLjgtMjEuNiw2LjgtMjgsMTAuOGMtNC42LTQuNC0wLjMtOC4xLDIuOS0xMS45Yy0xMS40LDQuMi0xNy4zLDkuNS0yMy41LDE0LjkKCQljLTIuMS0yLjgtNS4zLTQuOC0xLjQtMTEuNmMtOC4xLDQuNi0xNC4yLDEwLTE4LjcsMTYuMWMtNS0zLjEtMy03LjUtMy0xMS40Yy04LjQsNi44LTEzLjgsMTMuOS0yMC4zLDIxYy0xLjMtMC45LTIuNS00LjItMy41LTkuMgoJCWMtMjAuMSwxOS4yLTQ4LjUsNjcuNi03LjMsODYuOEMzMTYuOCw5My45LDM1OC43LDczLjIsNDA1LjEsNTcuN0w0MDUuMSw1Ny43eiIvPjxnPjxwYXRoIGZpbGw9IiNDMzFDNEEiIGQ9Ik0zMTkuMiw0NDkuMWMwLjIsMzUuOS0zMS42LDY1LjEtNzEuMSw2NS4zYy0zOS41LDAuMi03MS43LTI4LjctNzEuOS02NC42YzAtMC4yLDAtMC41LDAtMC43CgkJCWMtMC4yLTM1LjksMzEuNi02NS4xLDcxLjEtNjUuM2MzOS41LTAuMiw3MS43LDI4LjcsNzEuOSw2NC42QzMxOS4yLDQ0OC42LDMxOS4yLDQ0OC44LDMxOS4yLDQ0OS4xeiIvPjxnPjxwYXRoIGZpbGw9IiNDMzFDNEEiIGQ9Ik0yMDcuNywyNjMuNWMyOS42LDE5LjEsMzUsNjIuNSwxMS45LDk2LjhjLTIzLDM0LjMtNjUuNyw0Ni43LTk1LjQsMjcuNmwwLDBjLTI5LjYtMTkuMS0zNS02Mi41LTExLjktOTYuOAoJCQkJQzEzNS40LDI1Ni44LDE3OC4xLDI0NC40LDIwNy43LDI2My41TDIwNy43LDI2My41eiIvPjxwYXRoIGZpbGw9IiNDMzFDNEEiIGQ9Ik0yODcuNywyNjAuMWMtMjkuNiwxOS4xLTM1LDYyLjUtMTEuOSw5Ni44YzIzLDM0LjMsNjUuNyw0Ni43LDk1LjQsMjcuNmwwLDBjMjkuNi0xOS4xLDM1LTYyLjUsMTEuOS05Ni44CgkJCQlDMzYwLDI1My4zLDMxNy4zLDI0MSwyODcuNywyNjAuMUwyODcuNywyNjAuMXoiLz48L2c+PGc+PHBhdGggZmlsbD0iI0MzMUM0QSIgZD0iTTYxLjUsMjk1YzMyLTguNCwxMC44LDEzMC4zLTE1LjIsMTE5QzE3LjYsMzkxLjMsOC40LDMyNC44LDYxLjUsMjk1eiIvPjxwYXRoIGZpbGw9IiNDMzFDNEEiIGQ9Ik00MzEuMSwyOTMuM2MtMzItOC40LTEwLjgsMTMwLjMsMTUuMiwxMTlDNDc1LDM4OS41LDQ4NC4yLDMyMy4xLDQzMS4xLDI5My4zTDQzMS4xLDI5My4zeiIvPjwvZz48cGF0aCBmaWxsPSIjQzMxQzRBIiBkPSJNMzIzLjgsMTg5LjdjNTUuMi05LjIsMTAxLjEsMjMuMSw5OS4zLDgyLjFDNDIxLjMsMjk0LjQsMzAzLjUsMTkzLjEsMzIzLjgsMTg5Ljd6Ii8+PHBhdGggZmlsbD0iI0MzMUM0QSIgZD0iTTE3MS4zLDE4OGMtNTUuMi05LjItMTAxLjEsMjMuMS05OS4zLDgyLjFDNzMuOSwyOTIuNywxOTEuNywxOTEuMywxNzEuMywxODh6Ii8+PHBhdGggZmlsbD0iI0MzMUM0QSIgZD0iTTI0Ny40LDE3NC4yYy0zMi45LTAuOC02NC42LDI0LjEtNjQuNiwzOC41Yy0wLjEsMTcuNiwyNiwzNS42LDY0LjksMzZjMzkuNiwwLjMsNjQuOS0xNC40LDY1LjEtMzIuNQoJCQlDMzEyLjgsMTk1LjcsMjc2LjYsMTczLjksMjQ3LjQsMTc0LjJMMjQ3LjQsMTc0LjJ6Ii8+PHBhdGggZmlsbD0iI0MzMUM0QSIgZD0iTTI0OS45LDUzNC41YzI4LjctMS4yLDY3LjMsOS4xLDY3LjMsMjIuOGMwLjUsMTMuMy0zNSw0My40LTY5LjIsNDIuOWMtMzUuNSwxLjUtNzAuMy0yOC43LTY5LjktMzkuMQoJCQlDMTc3LjYsNTQ1LjgsMjIxLjQsNTMzLjgsMjQ5LjksNTM0LjVMMjQ5LjksNTM0LjV6Ii8+PGc+PHBhdGggZmlsbD0iI0MzMUM0QSIgZD0iTTE0My42LDQ1My4yYzIwLjQsMjQuMywyOS44LDY2LjksMTIuNyw3OS41Yy0xNi4xLDkuNi01NS40LDUuNi04My4yLTMzLjhjLTE4LjgtMzMuMS0xNi40LTY2LjgtMy4yLTc2LjcKCQkJCUM4OS43LDQxMC4zLDEyMC4xLDQyNi4zLDE0My42LDQ1My4yTDE0My42LDQ1My4yeiIvPjxwYXRoIGZpbGw9IiNDMzFDNEEiIGQ9Ik0zNDkuNSw0NDUuNWMtMjIuMSwyNS41LTM0LjQsNzIuMS0xOC4zLDg3LjFjMTUuNCwxMS42LDU2LjksMTAsODcuNS0zMS44YzIyLjItMjguMSwxNC44LTc1LDIuMS04Ny41CgkJCQlDNDAxLjksMzk4LjksMzc0LjgsNDE3LjMsMzQ5LjUsNDQ1LjVMMzQ5LjUsNDQ1LjV6Ii8+PC9nPjwvZz48L2c+PC9zdmc+"
                    alt="" class="logo">Pi Board</a></h1>
</nav>
<div class="container mt-5 main-board">
    <!-- CPU Row -->
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
            <!-- Host Card -->
            <div class="card weather-card mb-4">
                <!-- Card content -->
                <div class="card-body pb-3">
                    <!-- Title -->
                    <h4 class="card-title">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-host"></use>
                        </svg>
                        Host
                    </h4>
                    <!-- Text -->

                    <div id="pimodel" class="text-muted font-small">
                        <?php echo($D['model']['pimodel']); ?>
                    </div>

                    <div class="py-1"><?php echo($D['hostip']); ?></div>


                    <hr class="my-2">

                    <div class="d-flex justify-content-between pt-1 mt-1 text-center text-uppercase">
                        <div>
                            <div class="text-black-50 font-small">HostTime</div>
                            <p id="time" class="mb-0">00:00:00</p>
                        </div>
                        <div>
                            <div class="text-black-50 font-small">UpTime</div>
                            <p id="uptime" class="mb-0">4 days 16:51</p>
                        </div>
                    </div>

                    <hr class="my-2">

                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th scope="row" class="px-0 pb-0 pt-2">
                                USER
                            </th>
                            <td id="user" class="pb-0 pt-2 font-weight-normal"><?php echo($D['user']); ?></td>
                        </tr>
                        <tr class="mt-2">
                            <th scope="row" class="px-0 pb-0 pt-2">
                                OS
                            </th>
                            <td id="os" class="pb-0 pt-2 font-weight-normal"><?php echo($D['os'][0]); ?></td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="collapse-content">
                        <div class="collapse" id="collapseHostCard">
                            <table class="table table-borderless table-sm mb-0">
                                <hr class="my-2">
                                <tbody>
                                <tr>
                                    <td class="font-weight-normal align-middle">CPU</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-model"><?php echo($D['cpu']['model']) ?></span>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">HostName</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="hostname"><?php echo($D['hostname']); ?></span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-normal align-middle">Disk Total</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1">
                                            <span id="disk-total"></span>GB
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-normal align-middle">Disk Free</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1">
                                            <span id="disk-free"></span>GB
                                        </p>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <hr class="">
                        <a class="btn btn-flat text-info p-1 my-1 mr-0 mml-1 collapsed"
                           data-toggle="collapse"
                           href="#collapseHostCard" aria-expanded="false" aria-controls="collapseExample"></a>
                    </div>
                </div>
                <!-- Card Content -->
            </div>
            <!-- Host Card -->
        </div>
        <div class="col-lg-4 col-md-12 mb-3">
            <!-- CPU Card -->
            <div class="card weather-card mb-4">
                <!-- Card content -->
                <div class="card-body pb-3">
                    <!-- Title -->
                    <h4 class="card-title">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-cpu"></use>
                        </svg>
                        CPU
                    </h4>

                    <div class="d-flex justify-content-between">
                        <p class="display-4"><span id="container-cpu">0.0</span><span class="display-4">%</span></p>
                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <p><span id="cpu-freq">0</span><span>MHz</span></p>
                        <p>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-heat"></use>
                            </svg>
                            <span id="cpu-temp">0</span><span>°C</span></p>
                    </div>
                    <div class="progress md-progress">
                        <div id="cpu-progress" class="progress-bar black" role="progressbar" style="width: 0%"
                             aria-valuenow="40"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-between font-small text-muted mb-4">
                        <li class="pl-0">0</li>
                        <li class="pr-0">100%</li>
                    </ul>
                    <div class="collapse-content">
                        <div class="collapse" id="collapseCpuCard">
                            <table class="table table-borderless table-sm mb-0">
                                <tbody>
                                <tr>
                                    <td class="font-weight-normal align-middle">USER</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-use">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">SYS</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-sys">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud-sun-rain fa-lg text-info"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">NICE</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-nic">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">IOW</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-iow">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">IRQ</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-irq">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud fa-lg text-info"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">SIRQ</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-sirq">0</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud-sun fa-lg text-info"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">IDLE</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="cpu-stat-idl">100</span>%</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud-sun fa-lg text-info"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="">
                        <a class="btn btn-flat text-info p-1 my-1 mr-0 mml-1 collapsed"
                           data-toggle="collapse"
                           href="#collapseCpuCard" aria-expanded="false" aria-controls="collapseExample"></a>
                    </div>
                </div>
                <!-- Card Content -->
            </div>
            <!-- CPU Card -->
        </div>
        <div class="col-lg-4 col-md-12 mb-3">
            <!-- Memory Card -->
            <div class="card weather-card mb-4">
                <!-- Card content -->
                <div class="card-body pb-3">
                    <!-- Title -->
                    <h4 class="card-title">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-memory"></use>
                        </svg>
                        Memory
                    </h4>
                    <!-- Text -->

                    <div class="d-flex justify-content-between">
                        <p class="display-4"><span id="mem-percent">0</span>%</p>
                        <i class="fas fa-sun-o fa-5x pt-3 amber-text"></i>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <p><span id="container-mem">0</span><span class="text-muted">MB</span></p>
                    </div>
                    <div class="progress md-progress">
                        <div id="mem-progress" class="progress-bar black" role="progressbar" style="width: 0%"
                             aria-valuenow="40"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <ul class="list-unstyled d-flex justify-content-between font-small text-muted mb-4">
                        <li class="pl-0">0</li>
                        <!--                        <li>2000</li>-->
                        <li class="pr-0"><?php echo($D['mem']['total']) ?>MB</li>
                    </ul>
                    <div class="collapse-content">
                        <div class="collapse" id="collapseMemCard">
                            <table class="table table-borderless table-sm mb-0">
                                <tbody>
                                <tr>
                                    <td class="font-weight-normal align-middle">Cached</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="mem-cached"></span>MB</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">Buffers</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="mem-buffers"></span>MB</p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-normal align-middle">Swap</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="container-swap">0</span>MB /
                                            <span id="mem-swap-total" class="text-muted"></span>MB
                                        </p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud-sun-rain fa-lg text-info"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">AVG.1M</td>
                                    <td class="float-right font-weight-normal">
                                        <p id="loadavg-1m" class="mb-1"></p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">AVG.5M</td>
                                    <td class="float-right font-weight-normal">
                                        <p id="loadavg-5m" class="mb-1"></p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-sun fa-lg amber-text"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">AVG.10M</td>
                                    <td class="float-right font-weight-normal">
                                        <p id="loadavg-10m" class="mb-1"></p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud fa-lg text-info"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-normal align-middle">RUNNING</td>
                                    <td class="float-right font-weight-normal">
                                        <p class="mb-1"><span id="loadavg-running"></span> /
                                            <span id="loadavg-threads" class="text-muted"></span>
                                        </p>
                                    </td>
                                    <td class="float-right mr-3">
                                        <i class="fas fa-cloud-sun fa-lg text-info"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="">
                        <a class="btn btn-flat text-info p-1 my-1 mr-0 mml-1 collapsed"
                           data-toggle="collapse"
                           href="#collapseMemCard" aria-expanded="false" aria-controls="collapseExample"></a>
                    </div>
                </div>
                <!-- Card Content -->
            </div>
            <!-- Memory Card -->
        </div>
    </div>
    <!-- CPU Row -->


    <div class="card-body lighten-5 rounded-bottom px-1">

        <!-- Grid row -->
        <div class="row">

            <?php for ($i = 0; $i < $D['net']['count']; $i++) { ?>

                <!-- Grid column -->
                <div class="col-lg-4 clol-md-12 p-1">

                    <div class="card">
                        <div class="card-body pb-2">
                            <p id="net-interface-<?php echo($i + 1) ?>-name"
                               class="mb-2 h5"><?php echo($D['net']['interfaces'][$i]['name']) ?></p>
                            <i class="fas fa-cloud fa-3x pb-4"></i>
                            <div class="d-flex justify-content-between">
                                <p></p>
                                <p>
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-down"></use>
                                    </svg>
                                    <span id="net-interface-<?php echo($i + 1) ?>-down" class="mb-0">0</span>

                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-up"></use>
                                    </svg>
                                    <span id="net-interface-<?php echo($i + 1) ?>-up" class="mb-0 pr-4">0</span>
                                </p>
                            </div>
                        </div>
                        <hr>

                        <div class="card-body py-0 pl-0">
                            <div class="note note-success d-flex justify-content-between mb-2">
                                <span class="font-small text-muted">IN</span>
                                <span id="net-interface-<?php echo($i + 1) ?>-total-in"><?php echo($D['net']['interfaces'][$i]['total_in']) ?></span>
                            </div>
                            <div class="note note-info d-flex justify-content-between mb-3">
                                <span class="font-small text-muted">OUT</span>
                                <span id="net-interface-<?php echo($i + 1) ?>-total-out"><?php echo($D['net']['interfaces'][$i]['total_out']) ?></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Grid column -->
            <?php } ?>
        </div>
        <!-- Grid row -->
    </div>
</div>
<div class="container">
    <div class="footer-copyright text-left py-3 font-small border-top mt-4">
        <a href="https://migchar.com/pi-board" target="_blank">Pi Board 1.0.0</a> | Powered By
        <a href="https://migchar.com/" target="_blank"> migchar.com</a>
    </div>
</div>
<script src="assets/board.js"></script>
</body>
</html>
