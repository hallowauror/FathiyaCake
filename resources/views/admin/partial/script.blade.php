<!-- BEGIN: Vendor JS-->
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/js/core/app.min.js') }}"></script>
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/js/scripts/customizer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ URL::asset('vendor/admin/demo/vuexy-html-bootstrap-admin-template/app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>
<!-- END: Page JS-->

<script>
  $(window).on('load',  function(){
    if (feather) {
      feather.replace({ width: 14, height: 14 });
    }
  })
</script>