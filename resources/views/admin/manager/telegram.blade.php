@extends('layouts.app')

@section('body_class','nav-md')
@section('page')

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"> <img src="build/images/bdu_logo.png" width="30px" height="30px">
                        <span>Tender System</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                @include('admin.manager.include.profile-menu');
                <br />

                <!-- sidebar menu -->
                @include('admin.manager.include.side-nav');

            </div>
        </div>
        <!-- top navigation -->
        <header>
            @include('admin.manager.include.header')
        </header>
        <!-- /top navigation -->

        <!-- page content -->

        <div class="right_col" role="main">

            <div class="x_panel">
                <h3> Manager Dashboard | <i class="fa fa-send"></i></h3>
                <hr>
                <h4 style="color: blue">Send Tender Posts Via Telegram Bot | <small>የጨረታ ማስታወቂያ በቴሌግራም ቦት ይላኩ</small>
                    <i class="fa fa-send" style="color: blue"></i></h4><br />
                <div class="clearfix"></div>
            </div>

            <div class="x_panel">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 label-align" for="name">ግዥ ፈጻሚ አካል <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input id="purchaser" class="form-control" data-validate-words="2" required="required"
                            type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 label-align">የጨረታ ሰነድ የወጣበት የግዥ ዘዴ <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input id="purchase_method" required="required" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 label-align" for="number">የአገልግሎት ግዢ አይነት <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" id="purchase_type" required="required" class="form-control">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 label-align" for="telephone">የግዥ መለያ ቁጥር <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" id="purchase_id_no" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="textarea">የጨረታ ሰነድ የብዙ ምድብ(lot) መለያ
                        ቁጥር <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input required="required" id="lot_no" class="form-control"></textarea>
                    </div>
                </div>

                {{-- ***************** Modal body *********************** --}}
                </br>
                <div class="clearfix"></div>

                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a data-edit="fontSize 5">
                                    <p style="font-size:17px">Huge</p>
                                </a>
                            </li>
                            <li>
                                <a data-edit="fontSize 3">
                                    <p style="font-size:14px">Normal</p>
                                </a>
                            </li>
                            <li>
                                <a data-edit="fontSize 1">
                                    <p style="font-size:11px">Small</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                class="fa fa-strikethrough"></i></a>
                        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                class="fa fa-underline"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                class="fa fa-list-ul"></i></a>
                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                class="fa fa-list-ol"></i></a>
                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                class="fa fa-dedent"></i></a>
                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                class="fa fa-align-left"></i></a>
                        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                class="fa fa-align-center"></i></a>
                        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                class="fa fa-align-right"></i></a>
                        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                class="fa fa-align-justify"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                class="fa fa-link"></i></a>
                        <div class="dropdown-menu input-append">
                            <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                            <button class="btn" type="button">Add</button>
                        </div>
                        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                class="fa fa-picture-o"></i></a>
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                            data-edit="insertImage" />
                    </div>

                    <div class="btn-group">
                        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                    </div>
                </div>

                <div class="form-group">
                    <div id="editor-one" class="editor-wrapper">
                        <textarea class="form-control" rows="10" id="content" id="descr"></textarea></div>
                    <br />
                </div>
                <button type="submit" id="modal-savee" class="btn btn-primary" data-dismiss="modal">Post</button>
            </div>
        </div>
        <footer>
            @include('admin.sections.footer')
        </footer>
        @endsection
