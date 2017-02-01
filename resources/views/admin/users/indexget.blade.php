@extends('admin.app')

@section('top-scripts')
@stop

@section('page-title')
    Пользователи
@stop

@section('content')
    <div id="userVue">
        <!-- форма поиска -->
        <div class="row">

            <div class="col-xs-6">
                <a href="{{ route("dashboard.users.create") }}" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-plus"></i>Добавить пользователя</a>
            </div>

            <div class="col-xs-12">
                <br/>
                <div class="well" style="min-height: 100px">
                    <div class="row">
                        <form action="" id="formControl">

                            <div class="col-xs-2">
                                <select name="sortBy" id="" class="form-control" v-model="params.sortBy" v-bind:class="{marc : params.sortBy != 'id'}">
                                    <option value="id">По порядку</option>
                                    <option value="status">По статусу</option>
                                    <option value="role_id">По роли</option>
                                    <option value="name">По имени</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="sortByPor" class="form-control" v-bind:class="{marc : params.sortByPor != 'DESC'}" v-model="params.sortByPor">
                                    <option value="ASC">По возрастанию</option>
                                    <option value="DESC">По убыванию</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="paginate" class="form-control" v-bind:class="{marc : params.paginate != 20}" v-model="params.paginate">
                                    <option value="20">Показывать по 20</option>
                                    <option value="30">По 30</option>
                                    <option value="50">По 50</option>
                                    <option value="100">По 100</option>
                                    <option value="200">По 200</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="status" class="form-control" v-bind:class="{marc : params.status != ''}" v-model="params.status">
                                    <option value="">Все статусы</option>
                                    <option value="0">Новые</option>
                                    <option value="1">Звонил</option>
                                    <option value="2">Думает</option>
                                    <option value="3">Отказался</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <select name="role_id" class="form-control" v-bind:class="{marc : params.role_id != 0}" v-model="params.role_id">
                                    <option value="0">Все роли</option>
                                    <option value="1">Админ</option>
                                    <option value="2">Покупатель</option>
                                    <option value="3">Разовый покупатель</option>
                                    <option value="4">Монтажник</option>
                                </select>
                            </div>

                            <div class="col-xs-3" style="padding-top: 10px">
                                <input type="text" name="search" class="form-control" placeholder="Поиск" v-model="params.search">
                            </div>

                            <div class="col-xs-1 pull-right">
                                <button class="btn btn-sm btn-danger pull-right" v-on:click.prevent="getUsers()">Применить</button>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
                        </form>
                    </div>
                </div>

                <nav v-if="users.length > 0" v-show="!loader">
                    <ul class="pager">
                        <li class="previous" v-bind:class="{disabled : pagination.currentPage == 1}" v-on:click="prevPage()">
                            <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                        </li>
                        <li>
                            <span>Показано @{{ users.length }} из @{{ pagination.total }}</span>
                        </li>
                        <li>
                            <span>Страница @{{ pagination.pageToGet }} из @{{ pagination.lastPage }}</span>
                        </li>
                        <li class="next" v-bind:class="{disabled : pagination.currentPage == pagination.lastPage}" v-on:click="nextPage()">
                            <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- / форма поиска -->

        <!-- Вывод -->
        <div class="col-xs-12">
            <div id="errors"></div>
            <div v-show="loader" align="center"><img src='/frontend/images/loading.gif'></div>
            {{--<pre>
              @{{ users }}
            </pre>--}}
            <br/>
            <table id="sample-table-2" class="table table-bordered table-hover" v-show="!loader">
                <thead>
                <tr>
                    <th></th>
                    <th>Статус</th>
                    <th>Организация</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Город</th>
                    <th class="center" style="width: 135px">Роль</th>
                    <th colspan="2" class="options">Опции</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>
                            <i class="fa fa-eye green" v-if="user.active > 0"></i>
                            <i class="fa fa-eye red" v-else></i>
                        </td>
                        <td>
                            <span v-if="user.status == 0">Новый</span>
                            <span v-else-if="user.status == 1">Звонил</span>
                            <span v-else-if="user.status == 2">Думает</span>
                            <span v-else-if="user.status == 3">Отказался</span>
                        </td>
                        <td>@{{ user.organization }}</td>
                        <td><a v-bind:href="'/dashboard/users/' + user.id" target="_blank">@{{ user.name }}</a></td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.phone }}, @{{ user.phone_all }}</td>
                        <td>@{{ user.city }} <small style="color: #808080;">  @{{ user.country }} </small></td>
                        <td>
                            <span class="label label-danger arrowed" v-if="user.role_id == 1 && user.permissions == -5">Админ</span>
                            <span class="label label-info arrowed" v-if="user.role_id == 2">Покупатель</span>
                            <span class="label label-default arrowed" v-if="user.role_id == 3">Разовый покупатель</span>
                            <span class="label label-info arrowed" v-if="user.role_id == 4">Монтажник</span>
                        </td>
                        <td class="options">
                            <a class="green" v-bind:href="'/dashboard/users/' + user.id + '/edit'" target="_blank">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                        <td class="options">
                            <div class="action-buttons">
                                <label class="red" style="display: inline-block; cursor: pointer;">
                                    <i class="ace-icon fa fa-trash-o bigger-130" v-on:click.prevent="deleteUsers(user.id)"></i>
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p v-if="users.length == 0">
                <b>Список пользователей по текущему запросу пуст</b>
            </p>
            <nav v-if="users.length > 0" v-show="!loader">
                <ul class="pager">
                    <li class="previous" v-bind:class="{disabled : pagination.currentPage == 1}" v-on:click="prevPage()">
                        <a href="#"><span aria-hidden="true">&larr;</span> Предыдущая</a>
                    </li>
                    <li>
                        @{{ pagination.currentPage }} / @{{ pagination.lastPage  }}
                    </li>
                    <li class="next" v-bind:class="{disabled : pagination.currentPage == pagination.lastPage}" v-on:click="nextPage()">
                        <a href="#">Следующая <span aria-hidden="true">&rarr;</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- / Вывод -->
    </div>
@stop

@section('bottom-scripts')
    <script src="{!! url('admin/assets/js/vue2.js') !!}"></script>
    <script src="{!! url('admin/assets/js/vue2-resource.js') !!}"></script>
    <script src="/admin/assets/js/user/index.js"></script>
@stop
