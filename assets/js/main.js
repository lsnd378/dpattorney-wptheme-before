/**
 * D Pongkor & Partners - Main JavaScript
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initHeaderScroll();
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
        initCounterAnimation();
    });

    /**
     * Header Scroll Effect
     */
    function initHeaderScroll() {
        var header = document.getElementById('site-header');
        
        if (!header) return;
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        var toggle = document.getElementById('mobile-menu-toggle');
        var nav = document.getElementById('main-nav');
        var overlay = document.getElementById('mobile-menu-overlay');
        
        if (!toggle || !nav) return;
        
        toggle.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            
            if (overlay) {
                overlay.classList.toggle('active');
            }
        });
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                toggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.classList.remove('menu-open');
                overlay.classList.remove('active');
            });
        }
        
        var navLinks = nav.querySelectorAll('a');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                toggle.classList.remove('active');
                nav.classList.remove('active');
                document.body.classList.remove('menu-open');
                if (overlay) {
                    overlay.classList.remove('active');
                }
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                var targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    var headerOffset = 80;
                    var elementPosition = targetElement.getBoundingClientRect().top;
                    var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Scroll Animations (Intersection Observer)
     */
    function initScrollAnimations() {
        var revealElements = document.querySelectorAll('.reveal, .reveal-children');
        
        if (!revealElements.length) return;
        
        var observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        revealElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    /**
     * Counter Animation
     */
    function initCounterAnimation() {
        var counters = document.querySelectorAll('.counter');
        
        if (!counters.length) return;
        
        var observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };
        
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var counter = entry.target;
                    var target = parseInt(counter.getAttribute('data-target'));
                    var suffix = counter.getAttribute('data-suffix') || '';
                    var duration = 2000;
                    var steps = 60;
                    var increment = target / steps;
                    var current = 0;
                    
                    var timer = setInterval(function() {
                        current += increment;
                        if (current >= target) {
                            counter.textContent = target + suffix;
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current) + suffix;
                        }
                    }, duration / steps);
                    
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);
        
        counters.forEach(function(counter) {
            observer.observe(counter);
        });
    }

})(jQuery);
