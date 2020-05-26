export default class Helpers {
    static convertModelToFormData(data = {}, form = null, namespace = "") {
        let model = {};
        for (let propertyName in data) {
            model[propertyName] = data[propertyName];
        }

        let formData = form || new FormData();

        for (let propertyName in model) {
            let formKey = namespace
                ? `${namespace}[${propertyName}]`
                : propertyName;
            if (model[propertyName] instanceof Date)
                formData.append(formKey, model[propertyName].toISOString());
            else if (model[propertyName] instanceof File) {
                formData.append(formKey, model[propertyName]);
            } else if (model[propertyName] instanceof FileList) {
                Array.from(model[propertyName]).forEach((element, index) => {
                    const tempFormKey = `${formKey}[${index}]`;
                    formData.append(tempFormKey, element);
                });
            } else if (model[propertyName] instanceof Array) {
                model[propertyName].forEach((element, index) => {
                    const tempFormKey = `${formKey}[${index}]`;
                    if (typeof element === "object")
                        this.convertModelToFormData(
                            element,
                            formData,
                            tempFormKey
                        );
                    else formData.append(tempFormKey, element.toString());
                });
            } else if (
                typeof model[propertyName] === "object" &&
                !(model[propertyName] instanceof File)
            )
                this.convertModelToFormData(
                    model[propertyName],
                    formData,
                    formKey
                );
            else {
                formData.append(formKey, model[propertyName]);
            }
        }

        return formData;
    }
}
