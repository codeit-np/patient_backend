import { createRouter, createWebHistory } from 'vue-router';

import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import Users from '../pages/Users';
import AddUser from '../pages/AddUser';
import EditUser from '../pages/EditUser';
import Profile from '../pages/Profile';
import Hospitals from '../pages/Hospitals';
import EditHospital from '../pages/EditHospital';
import AddHospital from '../pages/AddHospital';
import Patients from '../patients/Patients';
import AddPatient from '../patients/AddPatient';
import EditPatient from '../patients/EditPatient';

const routes = [
  {
        name: 'register',
        path: '/lsyt/register',
        component: Register
    },
    {
        name: 'login',
        path: '/lsyt/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/lsyt/dashboard',
        component: Dashboard
    },
    {
        name: 'profile',
        path: '/lsyt/profile',
        component: Profile
    },
    {
        name: 'users',
        path: '/lsyt/users',
        component: Users
    },
    {
        name: 'edituser',
        path: '/lsyt/users-edit/:id',
        component: EditUser
    },
    {
        name: 'adduser',
        path: '/lsyt/users-add',
        component: AddUser
    },
    {
        name: 'hospitals',
        path: '/lsyt/hospitals',
        component: Hospitals
    },
    {
        name: 'edithospital',
        path: '/lsyt/hospitals-edit/:id',
        component: EditHospital
    },
    {
        name: 'addhospital',
        path: '/lsyt/hospitals-add',
        component: AddHospital
    },
    {
        name: 'patients',
        path: '/lsyt/patients',
        component: Patients
    },
    {
        name: 'addpatient',
        path: '/lsyt/patients-add',
        component: AddPatient
    },
    {
        name: 'editpatient',
        path: '/lsyt/patients-edit/:id',
        component: EditPatient
    },

];

const router = createRouter ({
  history: createWebHistory(),
  routes
});

export default router;
