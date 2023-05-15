const root = '/api';

module.exports = {
    root: root,

    auth: {
        user: `${root}/auth`,
        login: `${root}/login`,
        logout: `${root}/auth/logout`,
    },
};
