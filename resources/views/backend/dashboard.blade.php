@extends('layouts.backend')
@section('contents')
<style>

.das-board {
  text-align: center;
  padding: 40px;
  /*! border: 1px solid #ddd; */
  display: inline-block;
  width: 100%;
  background-color: #5693CD;
  color: #fff !important;
  border-radius: 10px;
  box-shadow: 1px 1px 15px 0px #ddd;
  transition: 0.4s;
}
.das-board h4 {
  color: #fff !important;
  font-size: 31px;
  margin-bottom: 0;
}
.das-board:hover {
  background-color: #00A3E8;
}
.nav.nav-pills.flex-column.flex-md-row.mb-3, h5 {
	margin-bottom: 0 !important;
}
.nav.nav-pills, .nav.nav-pills h5 {
	margin-bottom: 0 !important;
}
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('admin.vessel.index') }}" class="das-board">
                                    <h4> Vessel </h4>
                                </a>
                            </div>
                            <div class="col-md-4" >
                                <a href="{{ route('admin.crew.index') }}" class="das-board">
                                    <h4> On Board Crew </h4>
                                </a>
                            </div>
                            <div class="col-md-4" >
                                <a href="{{ route('admin.general-cv.index') }}" class="das-board">
                                    <h4> General CV </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</div>
@endsection
