// Fetch hospital data from JSON file
fetch('hospitals.json')
    .then(response => response.json())
    .then(data => {
        const hospitalList = document.getElementById('hospital-list');
        data.forEach(hospital => {
            const listItem = document.createElement('li');
            const name = document.createElement('h2');
            name.textContent = hospital.name;
            const address = document.createElement('p');
            address.textContent = `Address: ${hospital.address}`;
            const contact = document.createElement('p');
            contact.textContent = `Contact: ${hospital.contact}`;
            listItem.appendChild(name);
            listItem.appendChild(address);
            listItem.appendChild(contact);
            hospitalList.appendChild(listItem);
        });
    })
    .catch(error => console.error('Error fetching hospital data', error));
