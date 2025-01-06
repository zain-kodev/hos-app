import Breadcrumbs from "@/Components/Breadcrumbs";
import AppLayout from "@/Layouts/AppLayout";
import React from "react";
import { Head } from "@inertiajs/inertia-react";
import Description from "./Description";
import Feature from "./Feature";
import Images from "./Images";
import RelatedProducts from "./RelatedProducts";
const Product = (props) => {
    return (
        <AppLayout title={props.product.name}>
            <Head title={props.product.name} >
                <meta key="description" name="description" content={props.product.description_min} />
                <link key="apple-touch-icon" rel="apple-touch-icon" sizes="180x180" href={props.product.img}/>
                <link key="icon-32x32" rel="icon" type="image/png" sizes="32x32" href={props.product.img}/>
                <link key="icon-16x16" rel="icon" type="image/png" sizes="16x16" href={props.product.img}/>
                <link key="shortcut-icon" rel="shortcut icon" type="image/x-icon" href={props.product.img}/>
            </Head>

            <Breadcrumbs
                data={[
                    { path: route("products"), name: "المنتجات" },
                    {
                        path: route("products"),
                        name: props.product.category.name,
                    },
                    { name: props.product.name },
                ]}
            />
            <div className="py-section container ">
                <div>
                    <div className="flex flex-col gap-y-14 lg:flex-row lg:gap-x-10 lg:gap-y-0">
                        <div className="w-full lg:w-1/2">
                            <Images product={props.product} />
                        </div>
                        <div className="w-full lg:w-1/2">
                            <Feature product={props.product} />
                        </div>
                    </div>

                    <div className="mt-16">
                    <Description
                        weight={props.product.weight}
                        dimensions={props.product.dimensions}
                        description = {props.product.description_max}
                    />
                    </div>
                </div>

                <div className="mt-28">
                    <RelatedProducts products={props.relatedProducts} />
                </div>
            </div>
        </AppLayout>
    );
};

export default Product;
