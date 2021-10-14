let result = [];

fetch('https://jsonplaceholder.typicode.com/users')
    .then(response => response.json())
    .then(users => {
        users.forEach(user => {

            let email = user.email;
            let emailSplit = email.split('.');
            let emailPostfix = emailSplit[emailSplit.length - 1];

            if (emailPostfix === 'biz') {
                result.push(user);
            }
        });
        console.log(result);
    });