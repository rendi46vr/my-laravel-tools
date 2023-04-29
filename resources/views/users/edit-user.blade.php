    <div class="row">
        @csrf
        <input type="hidden" name="uniq" value="{{$user->id}}">
        <div class="col-6">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <td> Username</td>
                        <td>
                            <div class="vr-form">
                                <input class="msgusername" name="username" value="{{$user->username}}" type="text">
                                <div class="help-block text-danger with-errors"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <div class="vr-form">
                                <input class="msgname" name="name" type="text" value="{{$user->name}}" size="50">
                                <div class="help-block text-danger with-errors"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <div class="vr-form">
                                <input class="msgrole" name="role" type="text" size="50" value="{{$user->role}}">
                                <div class="help-block text-danger with-errors"></div>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
            <button class="btn btn-primary" type="submit">Simpan</button> <button type="reset" class="btn btn-success">BATAL</button>
        </div>
        <div class="col-6">
            <div class="row p-0">
                <div class="col-md-6 p-0">

                    <div class="form-group">
                        <div class="form-check">
                            <input id="closeButton" type="checkbox" form="AddUser" name="checkbox" value="1" value="checked" class="form-check-input">
                            <label class="form-check-label" for="closeButton">
                                Close Button
                            </label>
                        </div>
                        <div class="form-check">
                            <input id="addBehaviorOnToastClick" type="checkbox" form="AddUser" name="checkbox" value="2" value="checked" class="form-check-input">
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
                            <input id="progressBar" type="checkbox" form="AddUser" name="checkbox" value="3" value="checked" class="form-check-input">
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
                <div class="col-md-6 p-0">
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
        </div>
    </div>