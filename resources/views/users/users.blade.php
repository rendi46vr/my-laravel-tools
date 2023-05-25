@extends('layouts.app')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Users</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Data Users
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-animation">
            <div class="card mb-3">
                <div class="card-header-tab card-header">
                    <div class="col-12 col-lg-5 col-md-7 p-0">
                        <div class="d-flex justify-content-left align-items-center">
                            <button class=" mr-1 btn-icon btn btn-primary showform" data-form='AddUser' data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</button>
                            <p class="d-Inline show-sv m-0"></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-7 align-self-center">
                        <div class="d-flex justify-content-end">
                            <input type="text" class="d-inline search-height search-value mr-1" placeholder="Type to search">
                            <button class=" mr-1 btn-icon btn btn-light vr-search" data-add="searchusers"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <button class=" mr-1 btn-icon btn btn-danger">Pdf</button>
                            <button class=" mr-1 btn-icon btn btn-success " wire:click.prevent="create()">Excel</button>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive users">
                    {!! $users !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="AddUser" action="test" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td> Username</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgusername" name="username" type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgname" name="name" type="text" size="50">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <div class="vr-form">
                                                <input class="msgrole" name="role" type="text" size="50">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permission</td>
                                        <td>
                                            <div class="row p-0">
                                                <div class="col-md-6 col-lg-6 col-12 p-0">

                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input id="closeButton" type="checkbox" form="AddJpItem" name="checkbox" value="1" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="closeButton">
                                                                Close Button
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="addBehaviorOnToastClick" type="checkbox" form="AddJpItem" name="checkbox" value="2" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addBehaviorOnToastClick">
                                                                Add behavior on toast click
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input disabled="" id="addBehaviorOnToastCloseClick" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addBehaviorOnToastCloseClick">
                                                                Add behavior on toast close button click
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="debugInfo" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="debugInfo">
                                                                Debug
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="progressBar" type="checkbox" form="AddJpItem" name="checkbox" value="3" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="progressBar">
                                                                Progress Bar
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="rtl" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="rtl">
                                                                Right-To-Left
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="preventDuplicates" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="preventDuplicates">
                                                                Prevent Duplicates
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="addClear" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addClear">
                                                                Add button to force clearing a toast
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="newestOnTop" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="newestOnTop">
                                                                Newest on top
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 p-0">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input id="closeButton" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="closeButton">
                                                                Close Button
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="addBehaviorOnToastClick" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addBehaviorOnToastClick">
                                                                Add behavior on toast click
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input disabled="" id="addBehaviorOnToastCloseClick" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addBehaviorOnToastCloseClick">
                                                                Add behavior on toast close button click
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="debugInfo" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="debugInfo">
                                                                Debug
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="progressBar" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="progressBar">
                                                                Progress Bar
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="rtl" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="rtl">
                                                                Right-To-Left
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="preventDuplicates" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="preventDuplicates">
                                                                Prevent Duplicates
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="addClear" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="addClear">
                                                                Add button to force clearing a toast
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input id="newestOnTop" type="checkbox" value="checked" class="form-check-input">
                                                            <label class="form-check-label" for="newestOnTop">
                                                                Newest on top
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button> <button type="reset" class="btn btn-success">BATAL</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditUser" method="post" class="edit-user">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function refreshData(res) {
        $('.users').html(res);
    }

    function searchData() {
        if ($(".search-value") != null) {
            return {
                _token: tkn(),
                search: $(".search-value").val()
            }
        } else {
            return null
        }

    }
</script>
@endsection