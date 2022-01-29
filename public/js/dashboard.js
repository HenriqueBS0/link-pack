class Controller {
    constructor() {
        this.name = document.getElementById('name');
        this.url  = document.getElementById('url');

        this.buttonSave = document.getElementById('save');
        this.buttonSave.addEventListener('click', this.onClickButtonSave.bind(this));

        this.feedback = document.getElementById('feedback');

        this.linkUpdate = null;

        this.listLinks = new ListLink(this.setLinkToUpdate.bind(this));
    }
    async onClickButtonSave() {

        this.feedback.innerText = '';

        const data = this.getData();

        console.log(data);

        if(!data.name || !data.url) {
            this.feedback.innerText = 'Preencha os campos.';
            return;
        }

        const links = !this.linkUpdate
            ? await this.createLink(data)
            : await this.updateLink(data);

        this.listLinks.setLinks(links);

        this.name.value = '';
        this.url.value = '';
    }

    async createLink(data) {
        const link = await Request.post('/link', data);

        const links = this.listLinks.links;
        links.push(link);

        return links;
    }

    async updateLink(data) {

        const idLink = this.linkUpdate.id;

        await Request.put(`/link/${idLink}`, data);

        const links = this.listLinks.links.map(link => {
                return link.id != idLink
                    ? link
                    : {id: idLink, ...data}
        });

        this.clearLinkToUpdate();

        return links;
    }

    getData() {
        return {
            name: this.name.value,
            url: this.url.value
        }
    }

    setLinkToUpdate(data) {
        this.name.value = data.name;
        this.url.value = data.url;
        this.linkUpdate = data;
    }

    clearLinkToUpdate() {
        this.linkUpdate = null;
    }


}

class ListLink {
    constructor(setLinkToUpdate) {
        this.setLinkToUpdate = setLinkToUpdate;
        Request.send('/link')
            .then(links => {
                this.setLinks(links);
            });
    }

    setLinks(links) {
        this.links = links;
        this.renderLinks();
    }

    renderLinks() {
        const container = document.getElementById('links');

        container.innerHTML = '';

        this.links.forEach(data => {
            const link = new Link(data, this.updateLink.bind(this), this.deleteLink.bind(this));
            container.insertAdjacentElement('beforeend', link.element);
        });
    }

    async updateLink(data) {
        this.setLinkToUpdate(data);
    }

    async deleteLink(data) {
        await Request.delete(`/link/${data.id}`);

        const links = this.links.filter(link => link.id != data.id);

        this.setLinks(links);
    }
}

class Link {
    constructor(data, handleUpdate, handleDelete) {
        this.data = data;
        this.handleUpdate = handleUpdate;
        this.handleDelete = handleDelete;
        this.element = this.createElement();
    }

    async update() {
        await this.handleUpdate(this.data);
    }

    async delete() {
        await this.handleDelete(this.data);
    }

    createElement() {

        const container = document.createElement('div');
        container.setAttribute('class', 'containner-link');

        const link = document.createElement('a');
        link.setAttribute('href', this.data.url);
        link.setAttribute('target', '_blank');
        link.innerText = `${this.data.name}: ${this.data.url}`;

        const actions = document.createElement('div');
        actions.setAttribute('class', 'actions');

        const updateButton = document.createElement('button');
        updateButton.setAttribute('class', 'button update');
        updateButton.innerText ='Update';
        updateButton.addEventListener('click', this.update.bind(this));

        const deleteButton = document.createElement('button');
        deleteButton.setAttribute('class', 'button delete');
        deleteButton.innerText ='Delete';
        deleteButton.addEventListener('click', this.delete.bind(this));

        actions.insertAdjacentElement('beforeend', updateButton);
        actions.insertAdjacentElement('beforeend', deleteButton);

        container.insertAdjacentElement('beforeend', link);
        container.insertAdjacentElement('beforeend', actions);

        return container;
    }
}

class Request {

    static async get(url) {
        return await this.send(url, { method: 'GET' });
    }

    static async post(url, data) {
        return await this.send(url, this.getOptions(data));
    }

    static async put(url, data) {

        data = { ...data, '_method': 'PUT' };

        return await this.send(url, this.getOptions(data));
    }

    static async delete(url) {
        return await this.send(url, this.getOptions({ '_method': 'DELETE' }));
    }

    static getOptions(data) {
        return {
            method: 'POST',
            headers: {
                'Contenty-Type': 'multipart/form-data'
            },
            body: this.toFormData(data)
        }
    }

    static toFormData(data) {

        const formData = new FormData();

        for (const attribute in data) {
            formData.append(attribute, data[attribute]);
        }

        return formData;
    };

    static async send(url, options = {}) {
        return await (await (fetch(`http://localhost:8080${url}`, options))).json();
    }
}