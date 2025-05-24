<!--
=========================================================
* Argon Dashboard 3 PRO - v2.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/argon-dashboard-pro 
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <title>
   {{$dashboard_data->site_title}}
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100 g-sidenav-pinned">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <!-- side bar start -->
  @include('layouts.partials.sidebar')
   <!-- side bar end -->
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- End Navbar -->
    @yield('content')
  </main>

   <!--   Core JS Files   -->
   <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/choices.min.js"></script>
  <script src="../../assets/js/plugins/quill.min.js"></script>
  <script src="../../assets/js/plugins/flatpickr.min.js"></script>
  <script src="../../assets/js/plugins/dropzone.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>

    if (document.getElementById('editor')) {
      var quill = new Quill('#editor', {
        theme: 'snow' // Specify theme in configuration
      });
    }

    if (document.getElementById('choices-multiple-remove-button')) {
      var element = document.getElementById('choices-multiple-remove-button');
      const example = new Choices(element, {
        removeItemButton: true
      });

      example.setChoices(
        [{
            value: 'One',
            label: 'Label One',
            disabled: true
          },
          {
            value: 'Two',
            label: 'Label Two',
            selected: true
          },
          {
            value: 'Three',
            label: 'Label Three'
          },
        ],
        'value',
        'label',
        false,
      );
    }

    if (document.querySelector('.datetimepicker')) {
      flatpickr('.datetimepicker', {
        allowInput: true
      }); // flatpickr
    }

    Dropzone.autoDiscover = false;
    var drop = document.getElementById('dropzone')
    var myDropzone = new Dropzone(drop, {
      url: "/file/post",
      addRemoveLinks: true

    });
  </script>
  <!-- Kanban scripts -->
  <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/argon-dashboard.min.js?v=2.1.0"></script>

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
//Add new category
  $(document).ready(function(){
    $(document).on('click', '.save-category', function(e){
      e.preventDefault();
      let category_name = $('#category_name').val();
            
      $.ajax({
        url   : '{{route("store.category")}}',
        method: 'post',
        data  :{
          category_name:category_name,
        },
        success:function(res)
        {
          $('.success-msg').append('<div style="background: green; color: white" class="alert">' + res.msg + '</div>');
        },
        error:function(err){
          let error = err.responseJSON;
          $.each(error.errors,function(index, value)
          {
            $('.errors-msg').append('<div style="background: red;" class="alert text-white">'+ value +'</div>');
          });
        }
      })
    })
  })
//dashboard search 
$(function () {
    $('#search-input').on('keyup', function () {
        var searchQuery = $(this).val();
        var $resultsContainer = $('#search-results');

        if (searchQuery.length > 1) {
            $.ajax({
                type: "GET",
                url: "{{ route('search') }}",
                data: { query: searchQuery },
                success: function (data) {
                    $resultsContainer.empty().show();

                    if (data.length === 0) {
                        $resultsContainer.append('<li class="dropdown-item">No results found</li>');
                    } else {
                        $.each(data, function (index, item) {
                            var url = ''; // Define URLs dynamically
                            if (item.type === 'Post') {
                                url = "{{ route('edit.blog.post', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Branch') {
                                url = "{{ route('edit.branch', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Cars') {
                                url = "{{ route('edit.cars', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Service') {
                                url = "{{ route('edit.service', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Team') {
                                url = "{{ route('edit.team', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Feature') {
                                url = "{{ route('edit.feature', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Category') {
                                url = "{{ route('edit.category', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Testimonial') {
                                url = "{{ route('edit.testimonial', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'Branch') {
                                url = "{{ route('edit.branch', ['id' => ':id']) }}".replace(':id', item.id);
                            } else if (item.type === 'ExtraFacility') {
                                url = "{{ route('edit.extra.facility', ['id' => ':id']) }}".replace(':id', item.id);
                            }
                            var escapedTitle = $('<div>').text(item.title).html();
                            $resultsContainer.append(
                                `<li class="dropdown-item">
                                    <a href="${url}" class="text-decoration-none">
                                      ${escapedTitle} (${item.type})
                                    </a>
                                </li>`
                            );
                        });
                    }
                },
                error: function () {
                    $resultsContainer.empty().append('<li class="dropdown-item text-danger">Error retrieving data</li>').show();
                }
            });
        } else {
            $resultsContainer.empty().hide();
        }
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('.form-search').length) {
            $('#search-results').empty().hide();
        }
    });
});
</script>
</body>

</html>

