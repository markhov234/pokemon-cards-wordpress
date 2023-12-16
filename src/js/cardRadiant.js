document.addEventListener('DOMContentLoaded', function() {

    for(const card of document.querySelectorAll('.project_example-projects_cards-card')) {
        card.onmousemove = e => {
            handleMouseMove(e);
        }
    }

    const handleMouseMove = e => {

        console.log('Je suis ici')
        const {currentTarget:target} =e;
        
        const rect=target.getBoundingClientRect(),
        x=e.clientX - rect.left,
        y=e.clientY - rect.top;

        target.style.setProperty('--mouse-x',`${x}px`);
        target.style.setProperty('--mouse-y',`${y}px`);
    }

    });
  