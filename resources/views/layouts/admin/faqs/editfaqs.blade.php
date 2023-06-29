@extends('layouts.admin.adminLayout')

@section('content')
    <div class="db-info-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>{!! html_entity_decode($faqs[0]->question) !!}</h4>
                        </div>
                    </div>
                    <p></p>
                    <h4>Edit faqs</h4>
                    <form class="form-horizontal" method="POST" action="{{ route('faqs.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="faqid" value="{{ $faqs[0]->id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="1" @if ($faqs[0]->category == '1') selected @endif>Any Question
                                        </option>
                                        <option value="2" @if ($faqs[0]->category == '2') selected @endif>Question/Answers
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea name="question" class="form-control ckeditor">{{ $faqs[0]->question }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answer" class="form-control ckeditor">{{ $faqs[0]->answer }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="Submit" value="Update faqs">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->
@endsection
