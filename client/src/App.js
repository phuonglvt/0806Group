import './App.css';
import React, { Suspense } from 'react';
import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";
import HomePage from './pages/Home';
import LoginPage from './pages/Login';
import ProfilePage from './pages/Profile';

function App() {
  return (
    <div className="App">
      <Suspense fallback={<div>Loading App</div>}></Suspense>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="login" element={<LoginPage />} />
          <Route path="profile" element={<ProfilePage />} />
        </Routes>
      </BrowserRouter>
    </div >
  );
}

export default App;
