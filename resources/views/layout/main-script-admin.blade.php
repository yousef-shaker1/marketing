<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.stickOnScroll.js') }}"></script>
<script src="{{ URL::asset('assets/js/tinycolor-min.js') }}"></script>
<script src="{{ URL::asset('assets/js/config.js') }}"></script>
<script src="{{ URL::asset('assets/js/d3.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/topojson.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datamaps.all.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datamaps-zoomto.js') }}"></script>
<script src="{{ URL::asset('assets/js/datamaps.custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/gauge.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/apexcharts.custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/uppy.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/quill.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/feather.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/apps.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



<script>
	/* defind global options */
	Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
	Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script>
	$('.select2').select2(
	{
		theme: 'bootstrap4',
	});
	$('.select2-multi').select2(
	{
		multiple: true,
		theme: 'bootstrap4',
	});
	$('.drgpicker').daterangepicker(
	{
		singleDatePicker: true,
		timePicker: false,
		showDropdowns: true,
		locale:
		{
			format: 'MM/DD/YYYY'
		}
	});
	$('.time-input').timepicker(
	{
		'scrollDefault': 'now',
		'zindex': '9999' /* fix modal open */
	});
	/** date range picker */
	if ($('.datetimes').length)
	{
		$('.datetimes').daterangepicker(
		{
			timePicker: true,
			startDate: moment().startOf('hour'),
			endDate: moment().startOf('hour').add(32, 'hour'),
			locale:
			{
				format: 'M/DD hh:mm A'
			}
		});
	}
	var start = moment().subtract(29, 'days');
	var end = moment();

	function cb(start, end)
	{
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	}
	$('#reportrange').daterangepicker(
	{
		startDate: start,
		endDate: end,
		ranges:
		{
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		}
	}, cb);
	cb(start, end);
	$('.input-placeholder').mask("00/00/0000",
	{
		placeholder: "__/__/____"
	});
	$('.input-zip').mask('00000-000',
	{
		placeholder: "____-___"
	});
	$('.input-money').mask("#.##0,00",
	{
		reverse: true
	});
	$('.input-phoneus').mask('(000) 000-0000');
	$('.input-mixed').mask('AAA 000-S0S');
	$('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
	{
		translation:
		{
			'Z':
			{
				pattern: /[0-9]/,
				optional: true
			}
		},
		placeholder: "___.___.___.___"
	});
	// editor
	var editor = document.getElementById('editor');
	if (editor)
	{
		var toolbarOptions = [
			[
			{
				'font': []
			}],
			[
			{
				'header': [1, 2, 3, 4, 5, 6, false]
			}],
			['bold', 'italic', 'underline', 'strike'],
			['blockquote', 'code-block'],
			[
			{
				'header': 1
			},
			{
				'header': 2
			}],
			[
			{
				'list': 'ordered'
			},
			{
				'list': 'bullet'
			}],
			[
			{
				'script': 'sub'
			},
			{
				'script': 'super'
			}],
			[
			{
				'indent': '-1'
			},
			{
				'indent': '+1'
			}], // outdent/indent
			[
			{
				'direction': 'rtl'
			}], // text direction
			[
			{
				'color': []
			},
			{
				'background': []
			}], // dropdown with defaults from theme
			[
			{
				'align': []
			}],
			['clean'] // remove formatting button
		];
		var quill = new Quill(editor,
		{
			modules:
			{
				toolbar: toolbarOptions
			},
			theme: 'snow'
		});
	}
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function()
	{
		'use strict';
		window.addEventListener('load', function()
		{
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form)
			{
				form.addEventListener('submit', function(event)
				{
					if (form.checkValidity() === false)
					{
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
<script>
	var uptarg = document.getElementById('drag-drop-area');
	if (uptarg)
	{
		var uppy = Uppy.Core().use(Uppy.Dashboard,
		{
			inline: true,
			target: uptarg,
			proudlyDisplayPoweredByUppy: false,
			theme: 'dark',
			width: 770,
			height: 210,
			plugins: ['Webcam']
		}).use(Uppy.Tus,
		{
			endpoint: 'https://master.tus.io/files/'
		});
		uppy.on('complete', (result) =>
		{
			console.log('Upload complete! We’ve uploaded these files:', result.successful)
		});
	}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag()
	{
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-56159088-1');

	
</script>

<script>
	document.getElementById('modeSwitcher').addEventListener('click', function () {
			const currentMode = this.getAttribute('data-mode');
			const lightTheme = document.getElementById('lightTheme');
			const darkTheme = document.getElementById('darkTheme');

			if (currentMode === 'light') {
					// Switch to dark mode
					lightTheme.disabled = true;
					darkTheme.disabled = false;
					this.setAttribute('data-mode', 'dark');
					this.innerHTML = '<i class="fe fe-moon fe-16"></i>'; // تغيير الأيقونة
			} else {
					// Switch to light mode
					lightTheme.disabled = false;
					darkTheme.disabled = true;
					this.setAttribute('data-mode', 'light');
					this.innerHTML = '<i class="fe fe-sun fe-16"></i>'; // تغيير الأيقونة
			}
	});

	

</script>

@yield('js')