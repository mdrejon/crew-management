

@extends('layouts.backend')
@section('contents')
<?php
use Illuminate\Support\Facades\DB;
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">{{ $title }}</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>ID No</th>
                            <th>Vessel Name</th>
                            <th>Sign In</th>
                            <th>Sign Out</th>
                            <th>Certificate</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($crew as $data )
                                <tr>
                                    <td> <a href="{{ route('admin.crew.show', [$data->id]) }}" target="_blank">

                                            <img height="50px" width="50px" style="margin-right: 10px" src="{{ asset($data->img) }}" alt="">
                                            <strong>{{ $data->full_name }}</strong>
                                        </a>
                                    </td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->vessel_name }}</span></td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->id_no }}</span></td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->sign_in }}</span></td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->sign_out }}</span></td>
                                     <td><span ><button  type="button" class="btn btn-primary" data-id="{{ $data->id }}"  data-bs-toggle="modal"  data-bs-target="#CrewCertificateModal"  id="GetCrewCertificate" class="badge bg-label-primary me-1" >Certificate</button></span></td>
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        Action
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.crew.edit', [$data->id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <?php
                                        $gcv_count = DB::table('general_cvs')->where('crew_id', $data->id)->count();
                                        ?>
                                        @if($gcv_count > 0)
                                        <?php $gcv = DB::table('general_cvs')->where('crew_id', $data->id)->first(); ?>
                                        <a class="dropdown-item" href="{{ route('admin.general-cv.show', [$gcv->id]) }}"><i class="bx bx-edit-alt me-1"></i> View General CV </a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('admin.general-cv.create') }}"><i class="bx bx-edit-alt me-1"></i> Create General CV </a>
                                        @endif

                                        <a class="dropdown-item" href=""
                                            ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td  colspan="4">No record Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</div>
 <!-- Large Modal -->
 <div class="modal fade" id="CrewCertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
        $("#GetCrewCertificate").click(function(e) {
            e.preventDefault();

            var crew_id = $(this).attr('data-id');
            jQuery.ajax({
                url: "{{ route('admin.crewCertificate') }}",
                method: 'post',
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    crew_id: crew_id,
                },
                success: function(result){
                    console.log(result);
                }});
            });
});
  </script>
@endpush
@endsection
