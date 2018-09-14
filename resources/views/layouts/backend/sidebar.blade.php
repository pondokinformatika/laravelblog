<?php
$url3 = request()->segment(3);
$url2 = request()->segment(2);
$url1 = request()->segment(1);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" {{ $url1 == 'home' ? 'active' : '' }} " >
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
            <li class=" {{ $url2 == 'blog' && $url3 == null ? 'active' : '' }} ">
              <a href="{{ route('blog.index') }}">
                <i class="fa fa-book"></i> <span>All Posts</span>
              </a>
            </li>
        </li>



        @if (check_user_permissions(request(), "Categories@index"))
        <li class="{{ request()->is('backend/categories') ? 'active' : '' }}">
          <a href="{{ route('categories.index') }}">
            <i class="fa fa-user"></i> <span>Category</span>
          </a>
        </li>
        @endif
        @if (check_user_permissions(request(), "Users@index"))
        <li class="treeview {{ $url2 == 'roles' || $url2 == 'permissions' || $url2 == 'users' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=" {{ $url2 == 'users' ? 'active' : '' }} ">
              <a href="{{ route('users.index') }}">
                <i class="fa fa-circle-o"></i><span>Users</span>
              </a>
            </li>
            <li class=" {{ $url2 == 'roles' ? 'active' : '' }} ">
              <a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i>Roles</a>
            </li>
            <li class=" {{ $url2 == 'permissions' ? 'active' : '' }} ">
              <a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i>Permissions</a>
            </li>
          </ul>
        </li>
        @endif
        <li class="treeview
        {{
          (request()->is('stats')) ||
          (request()->is('stats/all')) ||
          (request()->is('stats/visits')) ||
          (request()->is('stats/bots')) ||
          (request()->is('stats/countries')) ||
          (request()->is('stats/os')) ||
          (request()->is('stats/browsers')) ||
          (request()->is('stats/languages')) ||
          (request()->is('stats/unique')) ||
          (request()->is('stats/users')) ||
          (request()->is('stats/urls'))
        ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-signal"></i> <span>Pengunjung</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="
            {{
              request()->is('stats') ? 'active' : ''
            }}">
              <a href=" {{route('visitortracker.summary')}} ">
                <i class="fa fa-circle-o"></i> Summary
              </a>
            </li>
            <li  class=" {{ request()->is('stats/all') ? 'active' : '' }} ">
              <a href=" {{route('visitortracker.all_requests')}} ">
                <i class="fa fa-circle-o"></i> All
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/visits') ? 'active' : ''
            }}
            ">
              <a href=" {{route('visitortracker.visits')}} ">
                <i class="fa fa-circle-o"></i> Visits
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/bots') ? 'active' : ''
            }}
            ">
              <a href=" {{route('visitortracker.bots')}}">
                <i class="fa fa-circle-o"></i> Bots
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/countries') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.countries')}}">
                <i class="fa fa-circle-o"></i> Country
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/os') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.os')}}">
                <i class="fa fa-circle-o"></i> OS
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/browsers') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.browsers')}}">
                <i class="fa fa-circle-o"></i> Browsers
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/languages') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.languages')}}">
                <i class="fa fa-circle-o"></i> Languages
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/unique') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.unique')}}">
                <i class="fa fa-circle-o"></i> Unique
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/users') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.users')}}">
                <i class="fa fa-circle-o"></i> Users
              </a>
            </li>
            <li class="
            {{
              request()->is('stats/urls') ? 'active' : ''
            }}
            ">
              <a href="{{route('visitortracker.urls')}}">
                <i class="fa fa-circle-o"></i> Url
              </a>
            </li>
          </ul>
        </li>
      </li>
          <li class=" {{ $url2 == 'blog' && $url3 == null ? 'active' : '' }} ">
            <a href="{{ route('comments.index') }}">
              <i class="fa fa-comment"></i> <span>Comments</span>
            </a>
          </li>
      </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
