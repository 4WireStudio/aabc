<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        @php(dynamic_sidebar('sidebar-footer-primary'))
      </div>
      <div class="col-sm-9">
        <h3>Services</h3>
        <div class="row">
          <div class="col-sm-3">@php(dynamic_sidebar('sidebar-footer-secondary-1'))</div>
          <div class="col-sm-3">@php(dynamic_sidebar('sidebar-footer-secondary-2'))</div>
          <div class="col-sm-3">@php(dynamic_sidebar('sidebar-footer-secondary-3'))</div>
          <div class="col-sm-3">@php(dynamic_sidebar('sidebar-footer-secondary-4'))</div>
        </div>
      </div>
  </div>
  <div class="bottom">
    <div class="container bottom-content">
      @php(dynamic_sidebar('sidebar-bottom'))
    </div>
  </div>
</footer>
