const getToken = () => {
    const $el = document.querySelector(`meta[name="csrf-token"]`);

    return $el && $el.getAttribute(`content`);
};

export default getToken;
