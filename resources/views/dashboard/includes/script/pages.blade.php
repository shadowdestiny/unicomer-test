<!-- Script vendor for Landing -->
{!! Html::script("dashboard/assets/js/core/jquery.min.js") !!}
{!! Html::script("dashboard/assets/js/core/popper.min.js") !!}
{!! Html::script("dashboard/assets/js/core/bootstrap-material-design.min.js") !!}
{!! Html::script("dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js") !!}
{!! Html::script("dashboard/assets/js/plugins/chartist.min.js") !!}
{!! Html::script("dashboard/assets/js/plugins/bootstrap-notify.js") !!}
{!! Html::script("dashboard/assets/js/material-dashboard.min.js?v=2.1.0") !!}

<!-- Script for Landing -->
<script>
	$(document).ready(function() {
		md.initDashboardPageCharts();
        $('[listenerClick]').trigger('click');
	});
</script>

@yield('script')