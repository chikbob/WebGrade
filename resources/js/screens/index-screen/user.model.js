import {BaseModel} from "../../models/base.model.js";
import {useStore} from "pinia-class-store";


class UserModel extends BaseModel {
    constructor() {
        super();
        this.user = undefined;
    }

    init(user) {
        this.user = user;
    }
}

export const userModel = useStore.bind(undefined, UserModel);
