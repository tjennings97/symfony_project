const courses = document.getElementById('courses');
if(courses) {
    courses.addEventListener('click', (e) => {
        if(e.target.className === 'delete') {
            if(confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/classes/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}
