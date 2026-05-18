document.querySelectorAll('.faq-toggle-btn').forEach(button => {
        button.addEventListener('click', function() {
            const answerDiv = this.closest('.faq-accordion-item').querySelector('.faq-answer');
            if (answerDiv.style.display === 'none') {
                answerDiv.style.display = 'block';
                this.textContent = 'Скрыть ответ';
            } else {
                answerDiv.style.display = 'none';
                this.textContent = 'Показать ответ';
            }
        });
    });