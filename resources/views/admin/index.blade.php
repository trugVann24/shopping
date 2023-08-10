@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                            </div>
                            <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-medium"><i class="bx bx-chevron-up"></i>
                                    68.2%</small>
                                <h3 class="mb-0">$84,686k</h3>
                            </div>
                        </div>
                        <div id="profileReportChart" style="min-height: 80px;">
                            <div id="apexchartsmihsgc9r" class="apexcharts-canvas apexchartsmihsgc9r apexcharts-theme-light"
                                style="width: 199px; height: 80px;"><svg id="SvgjsSvg1660" width="199" height="80"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1662" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(0, 0)">
                                        <defs id="SvgjsDefs1661">
                                            <clipPath id="gridRectMaskmihsgc9r">
                                                <rect id="SvgjsRect1667" width="200" height="85" x="-4.5"
                                                    y="-2.5" rx="0" ry="0" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                                </rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskmihsgc9r"></clipPath>
                                            <clipPath id="nonForecastMaskmihsgc9r"></clipPath>
                                            <clipPath id="gridRectMarkerMaskmihsgc9r">
                                                <rect id="SvgjsRect1668" width="195" height="84" x="-2"
                                                    y="-2" rx="0" ry="0" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                                </rect>
                                            </clipPath>
                                            <filter id="SvgjsFilter1674" filterUnits="userSpaceOnUse" width="200%"
                                                height="200%" x="-50%" y="-50%">
                                                <feFlood id="SvgjsFeFlood1675" flood-color="#ffab00" flood-opacity="0.15"
                                                    result="SvgjsFeFlood1675Out" in="SourceGraphic"></feFlood>
                                                <feComposite id="SvgjsFeComposite1676" in="SvgjsFeFlood1675Out"
                                                    in2="SourceAlpha" operator="in" result="SvgjsFeComposite1676Out">
                                                </feComposite>
                                                <feOffset id="SvgjsFeOffset1677" dx="5" dy="10"
                                                    result="SvgjsFeOffset1677Out" in="SvgjsFeComposite1676Out"></feOffset>
                                                <feGaussianBlur id="SvgjsFeGaussianBlur1678" stdDeviation="3 "
                                                    result="SvgjsFeGaussianBlur1678Out" in="SvgjsFeOffset1677Out">
                                                </feGaussianBlur>
                                                <feMerge id="SvgjsFeMerge1679" result="SvgjsFeMerge1679Out"
                                                    in="SourceGraphic">
                                                    <feMergeNode id="SvgjsFeMergeNode1680" in="SvgjsFeGaussianBlur1678Out">
                                                    </feMergeNode>
                                                    <feMergeNode id="SvgjsFeMergeNode1681" in="[object Arguments]">
                                                    </feMergeNode>
                                                </feMerge>
                                                <feBlend id="SvgjsFeBlend1682" in="SourceGraphic" in2="SvgjsFeMerge1679Out"
                                                    mode="normal" result="SvgjsFeBlend1682Out"></feBlend>
                                            </filter>
                                        </defs>
                                        <line id="SvgjsLine1666" x1="190.5" y1="0" x2="190.5"
                                            y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt"
                                            class="apexcharts-xcrosshairs" x="190.5" y="0" width="1"
                                            height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                            stroke-width="1"></line>
                                        <g id="SvgjsG1683" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1684" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG1692" class="apexcharts-grid">
                                            <g id="SvgjsG1693" class="apexcharts-gridlines-horizontal"
                                                style="display: none;">
                                                <line id="SvgjsLine1695" x1="0" y1="0" x2="191"
                                                    y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1696" x1="0" y1="20" x2="191"
                                                    y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1697" x1="0" y1="40" x2="191"
                                                    y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1698" x1="0" y1="60" x2="191"
                                                    y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1699" x1="0" y1="80" x2="191"
                                                    y2="80" stroke="#e0e0e0" stroke-dasharray="0"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1694" class="apexcharts-gridlines-vertical"
                                                style="display: none;"></g>
                                            <line id="SvgjsLine1701" x1="0" y1="80" x2="191"
                                                y2="80" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                            <line id="SvgjsLine1700" x1="0" y1="1" x2="0"
                                                y2="80" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG1669" class="apexcharts-line-series apexcharts-plot-series">
                                            <g id="SvgjsG1670" class="apexcharts-series" seriesName="seriesx1"
                                                data:longestSeries="true" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1673"
                                                    d="M 0 76C 13.370000000000001 76 24.830000000000002 12 38.2 12C 51.57000000000001 12 63.03 62 76.4 62C 89.77 62 101.23 22 114.6 22C 127.97 22 139.43 38 152.8 38C 166.17000000000002 38 177.63 6 191 6"
                                                    fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)"
                                                    stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                    stroke-dasharray="0" class="apexcharts-line" index="0"
                                                    clip-path="url(#gridRectMaskmihsgc9r)" filter="url(#SvgjsFilter1674)"
                                                    pathTo="M 0 76C 13.370000000000001 76 24.830000000000002 12 38.2 12C 51.57000000000001 12 63.03 62 76.4 62C 89.77 62 101.23 22 114.6 22C 127.97 22 139.43 38 152.8 38C 166.17000000000002 38 177.63 6 191 6"
                                                    pathFrom="M -1 120L -1 120L 38.2 120L 76.4 120L 114.6 120L 152.8 120L 191 120">
                                                </path>
                                                <g id="SvgjsG1671" class="apexcharts-series-markers-wrap"
                                                    data:realIndex="0">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1707" r="0" cx="191"
                                                            cy="6"
                                                            class="apexcharts-marker w917ms7t6 no-pointer-events"
                                                            stroke="#ffffff" fill="#ffab00" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9"
                                                            default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1672" class="apexcharts-datalabels" data:realIndex="0"></g>
                                        </g>
                                        <line id="SvgjsLine1702" x1="0" y1="0" x2="191"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1703" x1="0" y1="0" x2="191"
                                            y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1704" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1705" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1706" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <rect id="SvgjsRect1665" width="0" height="0" x="0"
                                        y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                    <g id="SvgjsG1691" class="apexcharts-yaxis" rel="0"
                                        transform="translate(-18, 0)"></g>
                                    <g id="SvgjsG1663" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 61.2875px; top: 9px;">
                                    <div class="apexcharts-tooltip-title"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">6</div>
                                    <div class="apexcharts-tooltip-series-group apexcharts-active"
                                        style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(255, 171, 0);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label">series-1: </span><span
                                                    class="apexcharts-tooltip-text-y-value">285</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
