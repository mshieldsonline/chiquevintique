( function () {
	'use strict';

	// Mobile nav toggle
	const toggle = document.querySelector( '.nav-toggle' );
	const nav    = document.querySelector( '.primary-nav' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			const isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', String( isOpen ) );
		} );

		// Close on outside click
		document.addEventListener( 'click', function ( e ) {
			if ( ! toggle.contains( e.target ) && ! nav.contains( e.target ) ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	// Animated hamburger → X
	if ( toggle ) {
		const bars = toggle.querySelectorAll( 'span' );
		toggle.addEventListener( 'click', function () {
			const open = toggle.getAttribute( 'aria-expanded' ) === 'true';
			if ( open ) {
				bars[0].style.transform = 'translateY(6px) rotate(45deg)';
				bars[1].style.opacity   = '0';
				bars[2].style.transform = 'translateY(-6px) rotate(-45deg)';
			} else {
				bars.forEach( b => { b.style.transform = ''; b.style.opacity = ''; } );
			}
		} );
	}

} )();
