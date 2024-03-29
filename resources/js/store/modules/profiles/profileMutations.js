export const getInitState = () => {
  return {
    profile: {
      user_id: null,
      corporate_number: "",
      company_name: "",
      username: "",
      avatar: null,
    },
  };
};

export const mutations = {
  storeProfile(state, data) {
    state.profile = data;
  },
  setProfile(state, data) {
    state.profile = { ...data };
  },
  resetState(state) {
    Object.assign(state, getInitState());
  },
};
