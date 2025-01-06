import Breadcrumbs from "@/Components/Breadcrumbs";
import Pagination from "@/Components/Pagination";
import AppLayout from "@/Layouts/AppLayout";

import React, { Fragment, useState, useEffect } from "react";
import Layout, { Sidebar } from "./Layout";
import Categories from "./Categories";
import FollowUs from "./FollowUs";
import NewProducts from "./NewProducts";
import ProductsList from "./ProductsList";
import { Inertia } from '@inertiajs/inertia';


const Products = (props) => {
    const [searchTerm, setSearchTerm] = useState('');
    const [currentSearchTerm, setCurrentSearchTerm] = useState('');
    let timer;

    const handleSearch = (e) => {
        const term = e.target.value;
        setSearchTerm(term);

        clearTimeout(timer); // Clear the previous timer

        timer = setTimeout(() => {
            Inertia.get(`/products/search/${term}`);
        }, 500);
        setCurrentSearchTerm(term);
    };

    // const handleSearch = (e) => {
    //     setSearchTerm(e.target.value);
    //     Inertia.get(`/products/search/${e.target.value}`);
    // };

    return (
        <AppLayout title="المنتجات">
            <Breadcrumbs
                data={[
                    { path: route("products"), name: "المنتجات" },
                    { name: "جميع منتجات المنصة" },
                ]}
            />
            <div className="py-section container">
                <Layout>
                    <Sidebar>
                        <Categories categories={props.categories} />
                        <NewProducts products={props.newProducts} />
                        {/*<Tags tags={props.tags} />*/}
                        <FollowUs />
                    </Sidebar>

                    <div className="w-full lg:w-9/12 ">
                        <div className="relative text-gray-600 mb-10">
                            <input type="search" name="search" placeholder="بحث في المنتجات..." className="bg-white h-10 px-5 pr-10 text-sm focus:outline-none" value={searchTerm} onChange={handleSearch} />
                            <button type="submit" className="absolute right-0 top-0 mt-3 mr-4">
                                <svg className="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M14 13h-1l-3.5-3.5 1-1 3.5 3.5v1zm-1 2h1v-1l3.5 3.5-1 1-3.5-3.5v-1z"/>
                                    <path d="M16 3c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 14c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6z"/>
                                </svg>
                            </button>
                        </div>
                        <ProductsList products={props.products} />
                        <Pagination data={props.products} />
                    </div>
                </Layout>
            </div>
        </AppLayout>
    );
};

export default Products;
{
    /* <div className="py-section container">
                <div className="flex flex-col-reverse gap-y-10 lg:flex-row lg:gap-x-10 lg:gap-y-0">
                    <div className="w-full lg:w-3/12">
                        <Sidebar
                            categories={props.categories}
                            tags={props.tags}
                            newProducts={props.newProducts}
                        />
                    </div>
                    <div className="w-full lg:w-9/12 ">
                        <ProductsList products={props.products} />
                        <Pagination data={props.products} />
                    </div>
                </div>
            </div> */
}
