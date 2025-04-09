<div>
      <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h2 class="ms-3">Responsive Bootstrap Sidebar</h2>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-4">Responsive Sidebar Example</h2>
                        <p>This is a responsive sidebar template using Bootstrap 5. The sidebar will collapse on smaller screens and can be toggled using the button in the navbar.</p>
                        <p>Try resizing your browser window or view on a mobile device to see how it works!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</div>