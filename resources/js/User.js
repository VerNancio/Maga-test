import { URI, routes } from './routes.js';

class User {

    static async getByName(name) {

        const URL = URI + routes['getUserByName'] + name;

        let res = await axios.get(URL)
            .then(response => {
                // console.log(response.data);
                return response.data.users;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });

        return res;
    }

    // static async getByName(name) {

    //     const URL = URI + routes['getUserByName'] + name;

    //     try {
    //         let res = await axios.get(URL);
    //         // console.log(res.data);
    //         return res.data;
    //     } catch (error) {
    //         console.error('Erro ao fazer a requisição:', error);
    //     }

    //     return {};
    // }

    static getById(id) {

        const URL = URI + routes['getUserById'] + id;

        axios.get(URL)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });
    }

    static create(name, cpf) {

        const URL = URI + routes['postUser'];

        const data = {
            'name': name, 
            'cpf': cpf
        }

        axios.post(URL, data)
            .then(response => {
                console.log(response.data)
                alert(response.data.msg);
                return response.data;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
                return false;
            });

        // alert("Usuário criado com sucesso");   
        window.location.reload();
    }

    static edit(id, name) {

        const URL = URI + routes['editUser'];

        console.log(URL)

        const data = {
            'id': id,
            'name': name,
        }

        axios.put(URL, data)
            .then(response => {
                console.log(response.data);
                alert("Usuário editado com sucesso");
                return response.data;
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
                return false;
            });

        window.location.reload();
    }

    static delete(id) {

        const URL = URI + routes['deleteUser'] + id;

        axios.delete(URL)
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.error('Erro ao fazer a requisição:', error);
            });

        window.location.reload();
    }
}

export default User;