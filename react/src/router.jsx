import {createBrowserRouter, Navigate} from "react-router-dom";

import GuestLayout from "./components/GuestLayout";
import DefaultLayout from "./components/DefaultLayout";

import Signup from "./views/auth/Signup.jsx";
import Login from "./views/auth/Login.jsx";

import AdminDashboard from "./views/dashboard/AdminDashboard.jsx"
import DoctorDashboard from "./views/dashboard/DoctorDashboard.jsx"
import Dashboard from "./views/dashboard/Dashboard.jsx";

import Users from "./views/user/Users.jsx";
import UserForm from "./views/user/UserForm.jsx";

import Assurances from "./views/assurance/Assurances.jsx";
import AssuranceForm from "./views/assurance/AssuranceForm.jsx";

import NotFound from "./views/NotFound";

const router = createBrowserRouter([
  {
    path: '/',
    element: <DefaultLayout/>,
    children: [
      {
        path: '/',
        element: <Navigate to="/users"/>
      },
      {
        path: '/dashboard',
        element: <Dashboard/>
      },
      {
        path: "/admin-dashboard", // Route vers le tableau de bord de l'administrateur
        element: <AdminDashboard />,
      },
      {
        path: "/doctor-dashboard", // Route vers le tableau de bord du médecin
        element: <DoctorDashboard />,
      },
      {
        path: '/users',
        element: <Users/>
      },
      {
        path: '/users/new',
        element: <UserForm key="userCreate" />
      },
      {
        path: '/users/:id',
        element: <UserForm key="userUpdate" />
      },
      {
        path: '/assurances',
        element: <Assurances/>
      },
      {
        path: '/assurances/new',
        element: <AssuranceForm key="assuranceCreate" />
      },
      {
        path: '/assurances/:id',
        element: <AssuranceForm key="assuranceUpdate" />
      }
    ]
  },
  {
    path: '/',
    element: <GuestLayout/>,
    children: [
      {
        path: '/login',
        element: <Login/>
      },
      {
        path: '/signup',
        element: <Signup/>
      }
    ]
  },
  {
    path: "*",
    element: <NotFound/>
  }
])

export default router;