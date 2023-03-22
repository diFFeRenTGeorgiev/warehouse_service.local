
@include('components.header');
<head>
    <title>McLaughlin Autoparts</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
    <script src="/resources/js/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
{{--<script src="{{ asset('jquery-3.6.4.min.js') }}"></script>--}}

<!-- Latest compiled and minified JavaScript -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<div class="row slide-tab responsive" id="headline">
    <div class="nav1 slide-tab " id="try">
        <ul class="op" id="non">
            <li class="active">
                <a class="brick" href="#" onclick="getTabContent('dashboard')">Dashboard</a>
            </li>
            <li>
                <a class="brick" href="#" onclick="getTabContent('pages')">Pages</a>
            </li>
            <li>
                <a class="brick" href="#" onclick="getTabContent('navigation')">Navigation</a>
            </li>
            <li>
                <a class="brick" href="#" onclick="getTabContent('users')">Users</a>
            </li>
            <li>
                <a class="brick" href="#" onclick="getTabContent('settings')">Website Settings</a>
            </li>
        </ul>
    </div>
    <div class="container center">
        <div class="tab-content">
            <div id="tab1"  class="content-pane is-active">
                <p>Tab 1 DASHBOARD</p>
            </div>
            <!-- /#tab1 -->

            <div id="tab2" class="content-pane">
                <p>Tab PAGES</p>
            </div>
            <!-- /#tab2 -->
            <div id="tab3" class="content-pane">
                <p>Tab 3 NAVIGATION</p>
            </div>
            <!-- /#tab3 -->
            <div id="tab4" class="content-pane">
                <p>Tab 4 USERS</p>
            </div>
            <!-- /#tab4 -->
            <div id="tab5" class="content-pane">
                <p>Tab 5 WEBSITE SETTINGS</p>
            </div>
            <!-- /#tab5 -->
        </div>
    </div>

    <h1>McLaughlin Autoparts</h1>
    <h3>Great Parts for Great Drivers!</h3>
</div>


</body>
<!-- /.tab-content -->

@include('components.footer')


<script>
    const Tabs = {
        init() {
            let promise = $.Deferred();
            this.$tabs = $('ul.op');
            this.checkHash();
            this.bindEvents();
            this.onLoad();
            return promise;
        },

        checkHash() {
            if (window.location.hash) {
                this.toggleTab(window.location.hash);
            }
        },

        toggleTab(tab) {
// targets
            let paneToHide = $(tab).closest('.container').find('div.content-pane').filter('.is-active'),
                paneToShow = $(tab),
                $tab = this.$tabs.find('a[href="' + tab + '"]');
// toggle active tab
            $tab.closest('li').addClass('active').siblings('li').removeClass('active');
// toggle active tab content
            paneToHide.removeClass('is-active').addClass('is-animating is-exiting');
            paneToShow.addClass('is-animating is-active');
        },

        showContent(tab) {

        },

        animationEnd(e) {
            $(e.target).removeClass('is-animating is-exiting');
        },

        tabClicked(e) {
            e.preventDefault();
            const $tab = $(e.target);
            if ($tab.parent().hasClass('active')) {
// clicked tab is already active, do nothing
                return;
            }
            this.toggleTab($tab.attr('href'));
        },
        bindEvents() {
// show/hide the tab content when clicking the tab button
            this.$tabs.on('click', 'a', this.tabClicked.bind(this));

// handle animation end
            $('div.content-pane').on('transitionend webkitTransitionEnd', this.animationEnd.bind(this));
        },

        onLoad() {
            $(window).load(function() {
                $('div.content-pane').removeClass('is-animating is-exiting');
                $('.op li .active').addClass('disabled');
            });
        }
    }

    Tabs.init();

    function getTabContent(tab) {
        $.ajax({
            type: "GET",
            url: "/tables",
            success: function(data) {
                $('.tab-content').html(data);
            }
        });
    }
</script>



