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
				'<path d="M0 37.4881H15.252L10.257 47.7223V52.548L28.188 37.4881V9.30005H0L0 37.4881Z" fill="#C2A74E"/>' +
				'<path d="M36.9893 14.6172V37.488H49.3637L45.3101 45.792V49.7058L59.8583 37.488V14.6172H36.9893Z" fill="#C2A74E"/>' +
				'</svg></span>';
			$('.bt-post--content blockquote').append(quoteIcon);

			var ulIcon = '<span class="bt-ul-icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">' +
				'<path d="M2.74902 8.33377C2.43837 8.33464 2.13431 8.42344 1.87202 8.58991C1.60973 8.75638 1.39993 8.99371 1.26689 9.27444C1.13386 9.55517 1.08302 9.86783 1.12027 10.1762C1.15751 10.4847 1.28132 10.7762 1.47736 11.0172L5.65647 16.1366C5.80548 16.3216 5.99648 16.4684 6.21361 16.5648C6.43074 16.6612 6.66774 16.7044 6.90491 16.6908C7.41216 16.6635 7.87013 16.3922 8.16211 15.946L16.8432 1.96516C16.8446 1.96284 16.8461 1.96052 16.8476 1.95824C16.9291 1.83317 16.9027 1.58532 16.7345 1.42962C16.6884 1.38687 16.6339 1.35402 16.5745 1.3331C16.5152 1.31218 16.4522 1.30363 16.3894 1.30799C16.3266 1.31235 16.2654 1.32951 16.2095 1.35842C16.1535 1.38734 16.1042 1.42739 16.0643 1.47611C16.0612 1.47994 16.058 1.48372 16.0547 1.48743L7.2997 11.3793C7.26639 11.4169 7.22592 11.4476 7.18067 11.4694C7.13541 11.4913 7.08625 11.504 7.03606 11.5067C6.98587 11.5094 6.93564 11.5021 6.88828 11.4852C6.84093 11.4684 6.7974 11.4423 6.76022 11.4084L3.8546 8.76431C3.55283 8.48768 3.1584 8.33408 2.74902 8.33377Z" fill="#C2A74E"/>' +
				'</svg></span>';
			$('.bt-post--content ul li').append(ulIcon);
		}
		if ($('.single-product').length > 0) {
			var Iconstock = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none"><path d="M2.74902 9.20047C2.43837 9.20134 2.13431 9.29014 1.87202 9.45661C1.60973 9.62308 1.39993 9.86041 1.26689 10.1411C1.13386 10.4219 1.08302 10.7345 1.12027 11.0429C1.15751 11.3514 1.28132 11.6429 1.47736 11.8839L5.65647 17.0033C5.80548 17.1883 5.99648 17.3351 6.21361 17.4315C6.43074 17.5279 6.66774 17.5711 6.90491 17.5575C7.41216 17.5302 7.87013 17.2589 8.16211 16.8127L16.8432 2.83186C16.8446 2.82954 16.8461 2.82722 16.8476 2.82493C16.9291 2.69987 16.9027 2.45202 16.7345 2.29632C16.6884 2.25357 16.6339 2.22072 16.5745 2.1998C16.5152 2.17888 16.4522 2.17033 16.3894 2.17469C16.3266 2.17904 16.2654 2.19621 16.2095 2.22512C16.1535 2.25403 16.1042 2.29409 16.0643 2.34281C16.0612 2.34664 16.058 2.35042 16.0547 2.35413L7.2997 12.246C7.26639 12.2836 7.22592 12.3143 7.18067 12.3361C7.13541 12.358 7.08625 12.3707 7.03606 12.3734C6.98587 12.3761 6.93564 12.3688 6.88828 12.3519C6.84093 12.3351 6.7974 12.309 6.76022 12.2751L3.8546 9.63101C3.55283 9.35438 3.1584 9.20078 2.74902 9.20047Z" fill="#C2A74E"/></svg>';
			$('.single-product p.stock.in-stock span').append(Iconstock);

			var ulIcon = '<span class="bt-ul-icon"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">' +
				'<path d="M2.74902 8.33377C2.43837 8.33464 2.13431 8.42344 1.87202 8.58991C1.60973 8.75638 1.39993 8.99371 1.26689 9.27444C1.13386 9.55517 1.08302 9.86783 1.12027 10.1762C1.15751 10.4847 1.28132 10.7762 1.47736 11.0172L5.65647 16.1366C5.80548 16.3216 5.99648 16.4684 6.21361 16.5648C6.43074 16.6612 6.66774 16.7044 6.90491 16.6908C7.41216 16.6635 7.87013 16.3922 8.16211 15.946L16.8432 1.96516C16.8446 1.96284 16.8461 1.96052 16.8476 1.95824C16.9291 1.83317 16.9027 1.58532 16.7345 1.42962C16.6884 1.38687 16.6339 1.35402 16.5745 1.3331C16.5152 1.31218 16.4522 1.30363 16.3894 1.30799C16.3266 1.31235 16.2654 1.32951 16.2095 1.35842C16.1535 1.38734 16.1042 1.42739 16.0643 1.47611C16.0612 1.47994 16.058 1.48372 16.0547 1.48743L7.2997 11.3793C7.26639 11.4169 7.22592 11.4476 7.18067 11.4694C7.13541 11.4913 7.08625 11.504 7.03606 11.5067C6.98587 11.5094 6.93564 11.5021 6.88828 11.4852C6.84093 11.4684 6.7974 11.4423 6.76022 11.4084L3.8546 8.76431C3.55283 8.48768 3.1584 8.33408 2.74902 8.33377Z" fill="#C2A74E"/>' +
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
	});

	jQuery(window).on('resize', function () {
		DenaliSubmenuAuto();
		DenaliBorderTop();
	});

	jQuery(window).on('scroll', function () {

	});

})(jQuery);
