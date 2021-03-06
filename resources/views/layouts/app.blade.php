<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
      https://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Material Design Lite</title>

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">

        <link rel="shortcut icon" href="images/favicon.png">

        <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
        <!--
        <link rel="canonical" href="http://www.example.com/">
        -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.orange-light_blue.min.css">
        <link rel="stylesheet" href="/css/template.css">
        @yield('style')
        <style>
            #view-source {
                position: fixed;
                display: block;
                right: 0;
                bottom: 0;
                margin-right: 40px;
                margin-bottom: 40px;
                z-index: 900;
            }
        </style>
    </head>
    <body>
        <div class="layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">@yield('title')</span>
                    <div class="mdl-layout-spacer"></div>
                    <a href="/logout" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons">vpn_key</i>
                    </a>
                </div>
            </header>
            <div class="drawer mdl-layout__drawer mdl-color--orange-900 mdl-color-text--orange-50">
                <header class="drawer-header">
                    <img src="images/user.jpg" class="avatar">
                    <div class="avatar-dropdown">
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                </header>
                <nav class="navigation mdl-navigation mdl-color--orange-800">
                    <a href="/" class="mdl-navigation__link mdl-color-text--white" href="{{ url('/') }}"><i class="mdl-color-text--white material-icons" role="presentation">home</i>Dashboard</a>
                    <a class="mdl-navigation__link mdl-color-text--white" href="{{ url('/classes') }}"><i class="mdl-color-text--white material-icons" role="presentation">group</i>Klassen</a>
                    <a class="mdl-navigation__link mdl-color-text--white" href="{{ url('/users') }}"><i class="mdl-color-text--white material-icons" role="presentation">person</i>Gebruikers</a>
                    <a class="mdl-navigation__link mdl-color-text--white" href="{{ url('/activity') }}"><i class="mdl-color-text--white material-icons" role="presentation">compare_arrows</i>Requests</a>
                    <a class="mdl-navigation__link mdl-color-text--white" href="{{ url('/settings') }}"><i class="mdl-color-text--white material-icons" role="presentation">settings</i>Instellingen</a>
                    <div class="mdl-layout-spacer"></div>
                </nav>
            </div>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid content">
                    @yield('content')
                </div>
            </main>
        </div>
        <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        @yield('javascript')
    </body>
</html>
