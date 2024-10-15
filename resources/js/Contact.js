import { URI, routes } from './routes.js';

class Contact {

    static getByName(name) {

        const URL = URI + routes['getContactByName'] + name;

        axios.get(URL)
            .then(response => {
                console.log(response.data);
                return response.data;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });
    }

    static getById(id) {

        const URL = URI + routes['getContactById'] + id;

        axios.get(URL)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });
    }

    static create(type, desc, ownerId) {

        const URL = URI + routes['postContact'];

        const data = {
            'type': type, 
            'desc': desc,
            'owner': ownerId
        }

        let msg = axios.post(URL, data)
            .then(response => {
                return response.data;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
                return false;
            });

        window.location.reload();
        return msg;
    }

    static edit(id, type, desc) {

        const URL = URI + routes['editContact'];

        const data = {
            'id': id,
            'type': type, 
            'desc': desc
        }

        axios.put(URL, data)
            .then(response => {
                alert('User editado com sucesso');
                return response.data;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
                return false;
            });
    }

    static delete(id) {

        const URL = URI + routes['deleteContact'] + id;

        let msg;
        
        axios.delete(URL)
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });

        window.location.reload();
        return msg;
    }
}

export default Contact;