import { formatCurrency } from "@/Helpers/helpers";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { Heading3, Heading4, Heading5 } from "./Elements";

const ProductCard = ({ product }) => {
    return (
        <Link href={route("product", { slug: product.slug })}>
            <div>
                <div className="relative">
                    {/* Offer Badge */}
                    {product.offer && (
                        <div className="absolute top-0 left-0 bg-teal-500 text-white text-xs font-bold px-2 py-1">
                            اليوم الوطني
                        </div>
                    )}

                    <img
                        className="w-full rounded object-cover md:h-80 lg:h-60"
                        src={product.img}
                        alt={product.name}
                    />
                    <div className="absolute inset-0 opacity-0 transition-all duration-500 hover:opacity-100">
                        <div className="absolute inset-0 bg-orange-100 opacity-80 "></div>

                        {/*<div className="absolute inset-0 flex items-center justify-center">*/}
                        {/*    <div className="flex space-x-8">*/}
                        {/*        <div className="flex h-8 w-16 items-center justify-center bg-gray-800 text-white">*/}
                        {/*            اضافة للسلة*/}
                        {/*        </div>*/}

                        {/*    </div>*/}
                        {/*</div>*/}
                    </div>
                </div>
                <div className="pt-5 pb-6">
                    <div className="text-center">
                        <Heading5 className="mb-2 w-full">
                            {product.name}
                        </Heading5>

                        <p className="mb-3 font-text text-sm">
                            {product.sentence}
                        </p>

                        {/* Price Display */}
                        {product.offer ? (
                            <>
                                <span className="line-through text-gray-500">{formatCurrency(product.old_price)}</span>
                                <span className="text-green-500 ml-2">{formatCurrency(product.price)}</span>
                            </>
                        ) : (
                            <Heading5>{formatCurrency(product.price)}</Heading5>
                        )}
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default ProductCard;
