<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan
                @can('curriculum_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/courses*")||request()->is("admin/lessons*")||request()->is("admin/questions*")||request()->is("admin/question-options*")||request()->is("admin/tests*")||request()->is("admin/test-results*")||request()->is("admin/test-answers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-globe-africa">
                            </i>
                            {{ trans('cruds.curriculumManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('course_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/courses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.courses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chalkboard-teacher">
                                        </i>
                                        {{ trans('cruds.course.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('lesson_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/lessons*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.lessons.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chalkboard">
                                        </i>
                                        {{ trans('cruds.lesson.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('question_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.questions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-question-circle">
                                        </i>
                                        {{ trans('cruds.question.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('question_option_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/question-options*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.question-options.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-question-circle">
                                        </i>
                                        {{ trans('cruds.questionOption.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('test_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tests.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-vials">
                                        </i>
                                        {{ trans('cruds.test.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('test_result_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/test-results*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.test-results.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-vial">
                                        </i>
                                        {{ trans('cruds.testResult.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('test_answer_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/test-answers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.test-answers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.testAnswer.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('order_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/orders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-address-book">
                            </i>
                            {{ trans('cruds.orderManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('order_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/orders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.orders.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-first-order-alt">
                                        </i>
                                        {{ trans('cruds.order.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('service_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/services*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-concierge-bell">
                            </i>
                            {{ trans('cruds.serviceManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('service_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/services*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.services.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-servicestack">
                                        </i>
                                        {{ trans('cruds.service.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('delivery_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/deliveries*")||request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-truck">
                            </i>
                            {{ trans('cruds.deliveryManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('delivery_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/deliveries*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.deliveries.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-map">
                                        </i>
                                        {{ trans('cruds.delivery.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('system_calendar_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-calendars.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                                        </i>
                                        {{ trans('cruds.systemCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/payments*")||request()->is("admin/payment-accounts*")||request()->is("admin/payment-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon far fa-money-bill-alt">
                            </i>
                            {{ trans('cruds.paymentManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('payment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-money-bill">
                                        </i>
                                        {{ trans('cruds.payment.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('payment_account_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payment-accounts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payment-accounts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-credit-card">
                                        </i>
                                        {{ trans('cruds.paymentAccount.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('payment_status_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/payment-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payment-statuses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-thermometer-quarter">
                                        </i>
                                        {{ trans('cruds.paymentStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('assignment_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/assignments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-tasks">
                            </i>
                            {{ trans('cruds.assignmentManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('assignment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/assignments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.assignments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-shoe-prints">
                                        </i>
                                        {{ trans('cruds.assignment.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('solved_assignment_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/categories*")||request()->is("admin/browse-assignments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-hands-helping">
                            </i>
                            {{ trans('cruds.solvedAssignment.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cubes">
                                        </i>
                                        {{ trans('cruds.category.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('browse_assignment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/browse-assignments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.browse-assignments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-search">
                                        </i>
                                        {{ trans('cruds.browseAssignment.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('research_library_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/author-details*")||request()->is("admin/journal-details*")||request()->is("admin/publishers*")||request()->is("admin/search-articles*")||request()->is("admin/keywords*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-book-open">
                            </i>
                            {{ trans('cruds.researchLibrary.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('author_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/author-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.author-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-pen">
                                        </i>
                                        {{ trans('cruds.authorDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('journal_detail_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/journal-details*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.journal-details.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.journalDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('publisher_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/publishers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.publishers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-print">
                                        </i>
                                        {{ trans('cruds.publisher.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('search_article_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/search-articles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.search-articles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-signature">
                                        </i>
                                        {{ trans('cruds.searchArticle.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('keyword_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/keywords*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.keywords.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.keyword.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>