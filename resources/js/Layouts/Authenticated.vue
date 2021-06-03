<template>
    <div class="wrapper">
        <!-- Navbar -->
        <nav
            class="
                main-header
                navbar navbar-expand navbar-dark navbar-dark
                text-sm
            "
        >
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-widget="pushmenu"
                        href="#"
                        role="button"
                        ><i class="fas fa-bars"></i
                    ></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <breeze-dropdown
                    id="settingsDropdown"
                    classes="nav-item dropdown user-menu"
                >
                    <template #trigger>
                        {{ $page.props.auth.user.name }}
                        <svg
                            class="ml-2"
                            width="18"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </template>

                    <template #content>
                        <!-- Authentication -->
                        <breeze-dropdown-link as="button"
                            :href="route('logout')"
                            method="post"
                        >
                            Log Out
                        </breeze-dropdown-link>
                    </template>
                </breeze-dropdown>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-2">
            <!-- Brand Logo -->
            <a href="/" class="brand-link text-sm">
                <breeze-application-logo
                    width="36"
                    class="brand-image img-circle elevation-2"
                    style="opacity: 0.8"
                />
                <span class="brand-text font-weight-light">AdminLTE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar mt-5 pt-4">
                <!-- Sidebar Menu -->
                <nav>
                    <breeze-menu-tree-view>
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <breeze-nav-link
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>&nbsp;Dashboard</p>
                        </breeze-nav-link>
                        <breeze-nav-link-tree-view>
                            <template v-slot:icon
                                ><i class="nav-icon fas fa-boxes"></i
                            ></template>
                            <template v-slot:label>
                                <p>&nbsp;Products</p>
                            </template>
                            <breeze-nav-link
                                :href="route('products.index')"
                                :active="route().current('products.index')"
                            >
                                <i class="nav-icon fas fa-table"></i>
                                <p>&nbsp;Index</p>
                            </breeze-nav-link>
                            <breeze-nav-link
                                :href="route('products.create')"
                                :active="route().current('products.create')"
                            >
                                <i class="nav-icon fas fa-plus"></i>
                                <p>&nbsp;Create</p>
                            </breeze-nav-link>
                        </breeze-nav-link-tree-view>
                    </breeze-menu-tree-view>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col">
                            <h1><slot name="header"></slot></h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- <breeze-banner /> -->

                    <div class="row">
                        <div class="col">
                            <slot></slot>
                        </div>
                        <div v-show="hasSlot('aside')" class="col-lg-3">
                            <slot name="aside"></slot>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b><a href="https://github.com/laravel/breeze">Breeze</a></b>
            </div>
            <strong>Powered by</strong>
            <a href="https://adminlte.io">AdminLTE</a>
        </footer>
    </div>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";
import BreezeNavLink from "@/Components/NavLink";
import BreezeMenuTreeView from "@/Components/MenuTreeView";
import BreezeNavLinkTreeView from "@/Components/NavLinkTreeView";

export default {
    components: {
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeMenuTreeView,
        BreezeNavLinkTreeView,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {
        hasSlot(name = "default") {
            return !!this.$slots[name];
        },
    },

    computed: {
        path() {
            return window.location.pathname;
        },
    },
};
</script>
