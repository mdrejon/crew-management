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
                            <th>Certificate name</th>
                            <th>Certificate Type</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($certificate as $data )
                                <tr>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->certificate_title }}</span></td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->certificate_type }}</span></td>
                                     <td><span class="badge bg-label-primary me-1"></span></td>
                                     <td><span class="badge bg-label-primary me-1">{{ $data->order }}</span></td>
                                     <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        Action
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.certificate.edit', [$data->id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
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
