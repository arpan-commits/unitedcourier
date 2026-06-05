<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel | UWC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/theme-script.js') }}" type="text/javascript"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/simplebar/simplebar.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="app-style">
</head>

<body>
    <div class="main-wrapper">

        @include('admin.partials.header')

        <div class="modal fade" id="searchModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-transparent">
                    <div class="card shadow-none mb-0">
                        <div class="px-3 py-2 d-flex flex-row align-items-center" id="search-top">
                            <i class="ti ti-search fs-22"></i>
                            <input type="search" class="form-control border-0" placeholder="Search">
                            <button type="button" class="btn p-0" data-bs-dismiss="modal"><i
                                    class="ti ti-x fs-22"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials.sidebar')

        <div class="page-wrapper">
            <div class="content pb-0">

                <!-- Page Header -->
                <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                    <div>
                        <h4 class="mb-1">Pricing Quotes</h4>
                    </div>
                    <div class="gap-2 d-flex align-items-center flex-wrap">
                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow"
                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh"
                            data-bs-original-title="Refresh" onclick="location.reload();"><i
                                class="ti ti-refresh"></i></a>
                        <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow"
                            data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Collapse"
                            data-bs-original-title="Collapse" id="collapse-header"><i
                                class="ti ti-transition-top"></i></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Pricing Quote Requests</h5>
                                <p class="card-text">All quote requests submitted from the website pricing section</p>
                            </div>
                            <div class="card-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="ti ti-circle-check me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-hover" id="quotesTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Category</th>
                                                <th>Volume</th>
                                                <th>Submitted At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($quotes as $quote)
                                                <tr>
                                                    <td>{{ $quote->id }}</td>
                                                    <td><strong>{{ $quote->first_name }}
                                                            {{ $quote->last_name }}</strong></td>
                                                    <td>{{ $quote->email }}</td>
                                                    <td>{{ $quote->phone }}</td>
                                                    <td>{{ $quote->origin }}</td>
                                                    <td>{{ $quote->destination }}</td>
                                                    <td>{{ $quote->business_category }}</td>
                                                    <td>{{ $quote->monthly_volume }}</td>
                                                    <td>{{ $quote->created_at ? $quote->created_at->format('d M Y, h:i A') : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                                            data-name="{{ $quote->first_name }} {{ $quote->last_name }}"
                                                            data-email="{{ $quote->email }}"
                                                            data-phone="{{ $quote->phone }}"
                                                            data-origin="{{ $quote->origin }}"
                                                            data-destination="{{ $quote->destination }}"
                                                            data-category="{{ $quote->business_category }}"
                                                            data-volume="{{ $quote->monthly_volume }}"
                                                            data-ip="{{ $quote->ip_address ?? '—' }}"
                                                            data-date="{{ $quote->created_at ? $quote->created_at->format('d M Y, h:i A') : 'N/A' }}">
                                                            <i class="ti ti-eye me-1"></i> View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="text-center py-4">
                                                        <p class="text-muted">No quote requests yet.</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- View Detail Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ti ti-file-invoice me-2"></i>Quote Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th class="text-muted" style="width: 35%;">Name</th>
                                <td id="modal-name"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Email</th>
                                <td id="modal-email"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Phone</th>
                                <td id="modal-phone"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Origin</th>
                                <td id="modal-origin"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Destination</th>
                                <td id="modal-destination"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Business Category</th>
                                <td id="modal-category"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Monthly Volume</th>
                                <td id="modal-volume"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">IP Address</th>
                                <td id="modal-ip"></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Submitted At</th>
                                <td id="modal-date"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>

    <!-- Tabler Icons -->
    <script src="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!--  -->
    <!-- Daterangepikcer JS -->
    <script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

    <!-- Apexchart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/peity/chart-data.js') }}" type="text/javascript"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}" type="text/javascript"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <!-- Flatpickr JS -->
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}" type="text/javascript"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>



    <script>
        $(document).ready(function() {
            $('#quotesTable').DataTable({
                order: [
                    [0, 'desc']
                ],
                pageLength: 25,
                language: {
                    search: "Search quotes:",
                    lengthMenu: "Show _MENU_ entries per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                }
            });
        });

        document.getElementById('viewModal').addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget;
            document.getElementById('modal-name').textContent = btn.dataset.name;
            document.getElementById('modal-email').textContent = btn.dataset.email;
            document.getElementById('modal-phone').textContent = btn.dataset.phone;
            document.getElementById('modal-origin').textContent = btn.dataset.origin;
            document.getElementById('modal-destination').textContent = btn.dataset.destination;
            document.getElementById('modal-category').textContent = btn.dataset.category;
            document.getElementById('modal-volume').textContent = btn.dataset.volume;
            document.getElementById('modal-ip').textContent = btn.dataset.ip;
            document.getElementById('modal-date').textContent = btn.dataset.date;
        });
    </script>

</body>

</html>
