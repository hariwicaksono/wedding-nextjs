import React, { Component } from 'react';
import Head from 'next/head';
import Link from 'next/link';
import Navbar from './navbar';
//import { Container } from 'react-bootstrap';
//import {isLogin, isAdmin} from '../libs/utils';

export const siteName = 'Wedding App'
export const siteTitle = 'Wedding App NextJS'

class Layout extends Component {
  
  render() {
    const { children, home } = this.props;

  return (
    <>
    <Head>  
    <meta charSet="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    </Head> 

    <Navbar/>

    {!home ? 
    <>
    <Link href="/" passHref>
        <a>← Kembali</a>
    </Link>
      {children}
    </>
    :
    <>
      {children}
    </>
    }

    </>
  );
  }
}
export default Layout;
