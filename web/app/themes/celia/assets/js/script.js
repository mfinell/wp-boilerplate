

const ready = fn => {
	if (document.readyState != 'loading'){
		fn();
	} else {
		document.addEventListener('DOMContentLoaded', fn);
	}
};
  
const scrollObject = {
	x: window.pageXOffset,
	y: window.pageYOffset
};

const gallerySection = document.querySelector( '.celia-gallery' );

ready(() => {
	document.querySelector('.celia-hero').classList.remove('is-image-hidden');
});


const position = el => {
	return {
		x: el.offsetLeft, 
		y: el.offsetTop
	};
};

const checkImageVisibility = () => {
	gallerySection.querySelectorAll( '.wp-block-image:not(.is-visible)' ).forEach( imageBlock => {
		if ( position( imageBlock ).y > scrollObject.y + window.innerHeight - imageBlock.offsetHeight * 0.5 ) {
			imageBlock.classList.add( 'is-not-in-viewport' );
		} else {
			imageBlock.classList.remove( 'is-not-in-viewport' );
			imageBlock.classList.add( 'is-visible' );
		}
	});
};

const updateScrollPosition = () => {
	scrollObject.x = window.pageXOffset;
	scrollObject.y = window.pageYOffset;
};

window.onscroll = () => {
	updateScrollPosition();
	checkImageVisibility();
};

checkImageVisibility();