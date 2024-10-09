!(function ($) {
	"use strict";

	/* Toggle submenu align */
	function DenaliSubmenuAuto() {
		if ($('.bt-site-header .bt-container').length > 0) {
			var container = $('.bt-site-header .bt-container'),
				containerInfo = { left: container.offset().left, width: container.innerWidth() },
				contLeftPos = containerInfo.left,
				contRightPos = containerInfo.left + containerInfo.width;

			$('.children, .sub-menu').each(function () {
				var submenuInfo = { left: $(this).offset().left, width: $(this).innerWidth() },
					smLeftPos = submenuInfo.left,
					smRightPos = submenuInfo.left + submenuInfo.width;

				if (smLeftPos <= contLeftPos) {
					$(this).addClass('bt-align-left');
				}

				if (smRightPos >= contRightPos) {
					$(this).addClass('bt-align-right');
				}

			});
		}
	}

	/* Toggle menu mobile */
	function DenaliToggleMenuMobile() {
		$('.bt-site-header .bt-menu-toggle').on('click', function (e) {
			e.preventDefault();

			if ($(this).hasClass('bt-menu-open')) {
				$(this).addClass('bt-is-hidden');
				$('.bt-site-header .bt-primary-menu').addClass('bt-is-active');
			} else {
				$('.bt-menu-open').removeClass('bt-is-hidden');
				$('.bt-site-header .bt-primary-menu').removeClass('bt-is-active');
			}
		});
	}

	/* Toggle sub menu mobile */
	function DenaliToggleSubMenuMobile() {
		var hasChildren = $('.bt-site-header .page_item_has_children, .bt-site-header .menu-item-has-children');

		hasChildren.each(function () {
			var $btnToggle = $('<div class="bt-toggle-icon"></div>');

			$(this).append($btnToggle);

			$btnToggle.on('click', function (e) {
				e.preventDefault();
				$(this).toggleClass('bt-is-active');
				$(this).parent().children('ul').toggle();
			});
		});
	}

	/* Orbit effect */
	function DenaliOrbitEffect() {
		if ($('.bt-orbit-enable').length > 0) {
			var html = '<div class="bt-orbit-effect">' +
				'<div class="bt-orbit-wrap">' +
				'<div class="bt-orbit red"><span></span></div>' +
				'<div class="bt-orbit blue"><span></span></div>' +
				'<div class="bt-orbit yellow"><span></span></div>' +
				'<div class="bt-orbit purple"><span></span></div>' +
				'<div class="bt-orbit green"><span></span></div>' +
				'</div>' +
				'</div>';

			$('.bt-site-main').append(html);
		}
	}

	/* Cursor effect */
	function DenaliCursorEffect() {
		if ($('.bt-bg-pattern-enable').length > 0) {
			var html = '<div class="bt-bg-pattern-effect"></div>';

			$('.bt-site-main').append(html);
		}
	}

	/* Buble effect */
	function DenaliBubleEffect() {
		if ($('.bt-bg-buble-enable').length > 0) {
			var html = '<div class="bt-bg-buble-effect">' +
				'<div class="bt-bubles-beblow"></div>' +
				'<div class="bt-bubles-above"></div>'
			'</div>';

			$('.bt-social-mcn-ss').append(html);

			for (let i = 0; i < 40; i++) {
				$('.bt-bubles-beblow').append('<span class="buble"></span>');
				$('.bt-bubles-above').append('<span class="buble"></span>');
			}
		}
	}

	/* Shop */
	function DenaliShop() {
		if ($('.single-product').length > 0) {
			$('.woocommerce-product-zoom__image').zoom();

			$('.woocommerce-product-gallery__slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				asNavFor: '.woocommerce-product-gallery__slider-nav',
				prevArrow: '<button type=\"button\" class=\"slick-prev\">Prev</button>',
				nextArrow: '<button type=\"button\" class=\"slick-next\">Next</button>'
			});
			$('.woocommerce-product-gallery__slider-nav').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				arrows: false,
				focusOnSelect: true,
				asNavFor: '.woocommerce-product-gallery__slider'
			});
		}
		if ($('.quantity input').length > 0) {
			/* Plus Qty */
			$(document).on('click', '.qty-plus', function () {
				var parent = $(this).parent();
				$('input.qty', parent).val(parseInt($('input.qty', parent).val()) + 1);
				$('input.qty', parent).trigger('change');
			});
			/* Minus Qty */
			$(document).on('click', '.qty-minus', function () {
				var parent = $(this).parent();
				if (parseInt($('input.qty', parent).val()) > 1) {
					$('input.qty', parent).val(parseInt($('input.qty', parent).val()) - 1);
					$('input.qty', parent).trigger('change');
				}
			});
		}

	}

	/* Units custom */
	function DenaliUnitsCustom() {
		if ($('.wp-block-search__button').length > 0) {
			$('.wp-block-search__button svg').replaceWith('<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">' +
				'<g clip-path="url(#clip0_19_3488)">' +
				'<path d="M24.408 21.3828L18.6603 15.6347C19.6369 14.08 20.2037 12.2424 20.2037 10.2703C20.2037 4.69102 15.6807 0.168701 10.1016 0.168701C4.52253 0.168701 0 4.69102 0 10.2703C0 15.8498 4.52232 20.3717 10.1016 20.3717C12.2478 20.3717 14.2356 19.7007 15.8714 18.5606L21.5506 24.2403C21.9453 24.6345 22.4626 24.8309 22.9793 24.8309C23.4966 24.8309 24.0133 24.6345 24.4086 24.2403C25.1972 23.4509 25.1972 22.1721 24.408 21.3828ZM10.1016 17.0989C6.33066 17.0989 3.27341 14.0419 3.27341 10.2707C3.27341 6.49957 6.33066 3.44232 10.1016 3.44232C13.8728 3.44232 16.9298 6.49957 16.9298 10.2707C16.9298 14.0419 13.8728 17.0989 10.1016 17.0989Z" fill="white"/>' +
				'</g>' +
				'<defs>' +
				'<clipPath id="clip0_19_3488">' +
				'<rect width="25" height="25" fill="white"/>' +
				'</clipPath>' +
				'</defs>' +
				'</svg>');
		}
		if ($('.bt-post--content').length > 0) {
			var quoteIcon = '<span class="bt-quote-icon"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">' +
				'<path d="M0 37.4881H15.252L10.257 47.7223V52.548L28.188 37.4881V9.30005H0L0 37.4881Z" fill="#698F65"/>' +
				'<path d="M36.9893 14.6172V37.488H49.3637L45.3101 45.792V49.7058L59.8583 37.488V14.6172H36.9893Z" fill="#698F65"/>' +
				'</svg></span>';
			$('.bt-post--content blockquote').append(quoteIcon);

			var ulIcon = '<span class="bt-ul-icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">' +
				'<path d="M2.74902 8.33377C2.43837 8.33464 2.13431 8.42344 1.87202 8.58991C1.60973 8.75638 1.39993 8.99371 1.26689 9.27444C1.13386 9.55517 1.08302 9.86783 1.12027 10.1762C1.15751 10.4847 1.28132 10.7762 1.47736 11.0172L5.65647 16.1366C5.80548 16.3216 5.99648 16.4684 6.21361 16.5648C6.43074 16.6612 6.66774 16.7044 6.90491 16.6908C7.41216 16.6635 7.87013 16.3922 8.16211 15.946L16.8432 1.96516C16.8446 1.96284 16.8461 1.96052 16.8476 1.95824C16.9291 1.83317 16.9027 1.58532 16.7345 1.42962C16.6884 1.38687 16.6339 1.35402 16.5745 1.3331C16.5152 1.31218 16.4522 1.30363 16.3894 1.30799C16.3266 1.31235 16.2654 1.32951 16.2095 1.35842C16.1535 1.38734 16.1042 1.42739 16.0643 1.47611C16.0612 1.47994 16.058 1.48372 16.0547 1.48743L7.2997 11.3793C7.26639 11.4169 7.22592 11.4476 7.18067 11.4694C7.13541 11.4913 7.08625 11.504 7.03606 11.5067C6.98587 11.5094 6.93564 11.5021 6.88828 11.4852C6.84093 11.4684 6.7974 11.4423 6.76022 11.4084L3.8546 8.76431C3.55283 8.48768 3.1584 8.33408 2.74902 8.33377Z" fill="#698F65"/>' +
				'</svg></span>';
			$('.bt-post--content ul li').append(ulIcon);
		}
		if ($('.single-product').length > 0) {
			var Iconstock = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none"><path d="M2.74902 9.20047C2.43837 9.20134 2.13431 9.29014 1.87202 9.45661C1.60973 9.62308 1.39993 9.86041 1.26689 10.1411C1.13386 10.4219 1.08302 10.7345 1.12027 11.0429C1.15751 11.3514 1.28132 11.6429 1.47736 11.8839L5.65647 17.0033C5.80548 17.1883 5.99648 17.3351 6.21361 17.4315C6.43074 17.5279 6.66774 17.5711 6.90491 17.5575C7.41216 17.5302 7.87013 17.2589 8.16211 16.8127L16.8432 2.83186C16.8446 2.82954 16.8461 2.82722 16.8476 2.82493C16.9291 2.69987 16.9027 2.45202 16.7345 2.29632C16.6884 2.25357 16.6339 2.22072 16.5745 2.1998C16.5152 2.17888 16.4522 2.17033 16.3894 2.17469C16.3266 2.17904 16.2654 2.19621 16.2095 2.22512C16.1535 2.25403 16.1042 2.29409 16.0643 2.34281C16.0612 2.34664 16.058 2.35042 16.0547 2.35413L7.2997 12.246C7.26639 12.2836 7.22592 12.3143 7.18067 12.3361C7.13541 12.358 7.08625 12.3707 7.03606 12.3734C6.98587 12.3761 6.93564 12.3688 6.88828 12.3519C6.84093 12.3351 6.7974 12.309 6.76022 12.2751L3.8546 9.63101C3.55283 9.35438 3.1584 9.20078 2.74902 9.20047Z" fill="#698F65"/></svg>';
			$('.single-product p.stock.in-stock span').append(Iconstock);

			var ulIcon = '<span class="bt-ul-icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">' +
				'<path d="M2.74902 8.33377C2.43837 8.33464 2.13431 8.42344 1.87202 8.58991C1.60973 8.75638 1.39993 8.99371 1.26689 9.27444C1.13386 9.55517 1.08302 9.86783 1.12027 10.1762C1.15751 10.4847 1.28132 10.7762 1.47736 11.0172L5.65647 16.1366C5.80548 16.3216 5.99648 16.4684 6.21361 16.5648C6.43074 16.6612 6.66774 16.7044 6.90491 16.6908C7.41216 16.6635 7.87013 16.3922 8.16211 15.946L16.8432 1.96516C16.8446 1.96284 16.8461 1.96052 16.8476 1.95824C16.9291 1.83317 16.9027 1.58532 16.7345 1.42962C16.6884 1.38687 16.6339 1.35402 16.5745 1.3331C16.5152 1.31218 16.4522 1.30363 16.3894 1.30799C16.3266 1.31235 16.2654 1.32951 16.2095 1.35842C16.1535 1.38734 16.1042 1.42739 16.0643 1.47611C16.0612 1.47994 16.058 1.48372 16.0547 1.48743L7.2997 11.3793C7.26639 11.4169 7.22592 11.4476 7.18067 11.4694C7.13541 11.4913 7.08625 11.504 7.03606 11.5067C6.98587 11.5094 6.93564 11.5021 6.88828 11.4852C6.84093 11.4684 6.7974 11.4423 6.76022 11.4084L3.8546 8.76431C3.55283 8.48768 3.1584 8.33408 2.74902 8.33377Z" fill="#698F65"/>' +
				'</svg></span>';
			$('.woocommerce-Tabs-panel--description ul li').append(ulIcon);
		}

	}
	/* Checkbox Custom Newsletter */
	function DenaliCheckboxCustom() {
		const $itemcheckbox = $('.tnp-privacy-field .tnp-privacy')
		if (!$itemcheckbox.length) return;
		const $divcheckbox = '<div class="checkmark"></div>';
		$itemcheckbox.parent().append($divcheckbox);

		if ($('.bt-newsletter-no-privacy').length > 0) {
			var privacyCheckbox = $('.bt-newsletter-no-privacy input.tnp-privacy');
			if (privacyCheckbox.length > 0 && !privacyCheckbox.prop('checked')) {
				privacyCheckbox.prop('checked', true);
			}
		}
	}
	/* Border Top arch */
	function DenaliBorderTop() {
		var elements = document.querySelectorAll('.bt-border-top-arch');
		if (window.innerWidth >= 768) {
			elements.forEach(function (element) {
				var width = element.offsetWidth;
				var borderRadius = width / 2 + 'px';
				element.style.borderTopLeftRadius = borderRadius;
				element.style.borderTopRightRadius = borderRadius;
			});
		} else {
			elements.forEach(function (element) {
				element.style.borderTopLeftRadius = '';
				element.style.borderTopRightRadius = '';
			});
		}
	};
	/* Get width body */
	function updateBodyWidthVariable() {
		var widthBody = $(window).width();
		$('.bt-col-container-left').css('--width-body', widthBody + 'px');
		$('.bt-col-container-right').css('--width-body', widthBody + 'px');
	}
	function Denali_GF_Select2() {
		$('.gform_wrapper').each(function() {
			const $self = $(this);
			$($self).find('select').select2({
				dropdownParent: $self,
				minimumResultsForSearch: Infinity
			});
		})

		if (jQuery('.gfield_checkbox').length > 0) {
			jQuery('.gfield_checkbox .gchoice').each(function () {
				jQuery(this).append('<div class=\"checkmark\"></div>');
			});
		}
		if (jQuery('.ginput_container.ginput_container_date').length > 0) {
			var dropdownIcon = '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">' +
				'<path d=\"M8 5.75C7.59 5.75 7.25 5.41 7.25 5V2C7.25 1.59 7.59 1.25 8 1.25C8.41 1.25 8.75 1.59 8.75 2V5C8.75 5.41 8.41 5.75 8 5.75Z\" fill=\"white\"/>' +
				'<path d=\"M16 5.75C15.59 5.75 15.25 5.41 15.25 5V2C15.25 1.59 15.59 1.25 16 1.25C16.41 1.25 16.75 1.59 16.75 2V5C16.75 5.41 16.41 5.75 16 5.75Z\" fill=\"white\"/>' +
				'<path d=\"M8.5 14.5001C8.37 14.5001 8.24 14.4701 8.12 14.4201C7.99 14.3701 7.89 14.3001 7.79 14.2101C7.61 14.0201 7.5 13.7701 7.5 13.5001C7.5 13.3701 7.53 13.2401 7.58 13.1201C7.63 13.0001 7.7 12.8901 7.79 12.7901C7.89 12.7001 7.99 12.6301 8.12 12.5801C8.48 12.4301 8.93 12.5101 9.21 12.7901C9.39 12.9801 9.5 13.2401 9.5 13.5001C9.5 13.5601 9.49 13.6301 9.48 13.7001C9.47 13.7601 9.45 13.8201 9.42 13.8801C9.4 13.9401 9.37 14.0001 9.33 14.0601C9.3 14.1101 9.25 14.1601 9.21 14.2101C9.02 14.3901 8.76 14.5001 8.5 14.5001Z\" fill=\"white\"/>' +
				'<path d=\"M12 14.4999C11.87 14.4999 11.74 14.4699 11.62 14.4199C11.49 14.3699 11.39 14.2999 11.29 14.2099C11.11 14.0199 11 13.7699 11 13.4999C11 13.3699 11.03 13.2399 11.08 13.1199C11.13 12.9999 11.2 12.8899 11.29 12.7899C11.39 12.6999 11.49 12.6299 11.62 12.5799C11.98 12.4199 12.43 12.5099 12.71 12.7899C12.89 12.9799 13 13.2399 13 13.4999C13 13.5599 12.99 13.6299 12.98 13.6999C12.97 13.7599 12.95 13.8199 12.92 13.8799C12.9 13.9399 12.87 13.9999 12.83 14.0599C12.8 14.1099 12.75 14.1599 12.71 14.2099C12.52 14.3899 12.26 14.4999 12 14.4999Z\" fill=\"white\"/>' +
				'<path d=\"M15.5 14.4999C15.37 14.4999 15.24 14.4699 15.12 14.4199C14.99 14.3699 14.89 14.2999 14.79 14.2099C14.75 14.1599 14.71 14.1099 14.67 14.0599C14.63 13.9999 14.6 13.9399 14.58 13.8799C14.55 13.8199 14.53 13.7599 14.52 13.6999C14.51 13.6299 14.5 13.5599 14.5 13.4999C14.5 13.2399 14.61 12.9799 14.79 12.7899C14.89 12.6999 14.99 12.6299 15.12 12.5799C15.49 12.4199 15.93 12.5099 16.21 12.7899C16.39 12.9799 16.5 13.2399 16.5 13.4999C16.5 13.5599 16.49 13.6299 16.48 13.6999C16.47 13.7599 16.45 13.8199 16.42 13.8799C16.4 13.9399 16.37 13.9999 16.33 14.0599C16.3 14.1099 16.25 14.1599 16.21 14.2099C16.02 14.3899 15.76 14.4999 15.5 14.4999Z\" fill=\"white\"/>' +
				'<path d=\"M8.5 17.9999C8.37 17.9999 8.24 17.97 8.12 17.92C8 17.87 7.89 17.7999 7.79 17.7099C7.61 17.5199 7.5 17.2599 7.5 16.9999C7.5 16.8699 7.53 16.7399 7.58 16.6199C7.63 16.4899 7.7 16.38 7.79 16.29C8.16 15.92 8.84 15.92 9.21 16.29C9.39 16.48 9.5 16.7399 9.5 16.9999C9.5 17.2599 9.39 17.5199 9.21 17.7099C9.02 17.8899 8.76 17.9999 8.5 17.9999Z\" fill=\"white\"/>' +
				'<path d=\"M12 17.9999C11.74 17.9999 11.48 17.8899 11.29 17.7099C11.11 17.5199 11 17.2599 11 16.9999C11 16.8699 11.03 16.7399 11.08 16.6199C11.13 16.4899 11.2 16.38 11.29 16.29C11.66 15.92 12.34 15.92 12.71 16.29C12.8 16.38 12.87 16.4899 12.92 16.6199C12.97 16.7399 13 16.8699 13 16.9999C13 17.2599 12.89 17.5199 12.71 17.7099C12.52 17.8899 12.26 17.9999 12 17.9999Z\" fill=\"white\"/>' +
				'<path d=\"M15.5 17.9999C15.24 17.9999 14.98 17.8899 14.79 17.7099C14.7 17.6199 14.63 17.5099 14.58 17.3799C14.53 17.2599 14.5 17.1299 14.5 16.9999C14.5 16.8699 14.53 16.7399 14.58 16.6199C14.63 16.4899 14.7 16.3799 14.79 16.2899C15.02 16.0599 15.37 15.9499 15.69 16.0199C15.76 16.0299 15.82 16.0499 15.88 16.0799C15.94 16.0999 16 16.1299 16.06 16.1699C16.11 16.1999 16.16 16.2499 16.21 16.2899C16.39 16.4799 16.5 16.7399 16.5 16.9999C16.5 17.2599 16.39 17.5199 16.21 17.7099C16.02 17.8899 15.76 17.9999 15.5 17.9999Z\" fill=\"white\"/>' +
				'<path d=\"M20.5 9.83984H3.5C3.09 9.83984 2.75 9.49984 2.75 9.08984C2.75 8.67984 3.09 8.33984 3.5 8.33984H20.5C20.91 8.33984 21.25 8.67984 21.25 9.08984C21.25 9.49984 20.91 9.83984 20.5 9.83984Z\" fill=\"white\"/>' +
				'<path d=\"M16 22.75H8C4.35 22.75 2.25 20.65 2.25 17V8.5C2.25 4.85 4.35 2.75 8 2.75H16C19.65 2.75 21.75 4.85 21.75 8.5V17C21.75 20.65 19.65 22.75 16 22.75ZM8 4.25C5.14 4.25 3.75 5.64 3.75 8.5V17C3.75 19.86 5.14 21.25 8 21.25H16C18.86 21.25 20.25 19.86 20.25 17V8.5C20.25 5.64 18.86 4.25 16 4.25H8Z\" fill=\"white\"/>' +
				'</svg>';
			jQuery('.ginput_container.ginput_container_date').append(dropdownIcon);
		}
	}

	jQuery(document).on('gform_post_render', function () {
		Denali_GF_Select2();
	});
	jQuery(document).ready(function ($) {
		DenaliSubmenuAuto();
		DenaliToggleMenuMobile();
		DenaliToggleSubMenuMobile();
		DenaliOrbitEffect();
		DenaliCursorEffect();
		DenaliBubleEffect();
		DenaliShop();
		DenaliUnitsCustom();
		DenaliCheckboxCustom();
		DenaliBorderTop();
		updateBodyWidthVariable();
	});

	jQuery(window).on('resize', function () {
		DenaliSubmenuAuto();
		DenaliBorderTop();
		updateBodyWidthVariable();
	});

	jQuery(window).on('scroll', function () {

	});

})(jQuery);
