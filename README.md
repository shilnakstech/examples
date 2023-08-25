# supplier-product-list
supplier product list task

# Supplier Product List Processor

The Supplier Product List Processor is a PHP-based command-line tool designed to parse various file formats containing product information, create product objects, and generate a count of unique combinations of product attributes.

## Requirements

- PHP 7+
- Text Editor (VS code, sublime,..)
- Terminal

## Installation

1. Clone the repository:
  -  git clone https://github.com/shilnakstech/examples.git

## Run the project

1. cd (project_directory_name)
  - In our project : cd examples
2. Run the below code in terminal
  - php parser.php --file example_1.csv --unique-combinations combination_count.csv
    
## Output

1. Return back the product objects in the terminal
2. A csv file named combination_count.csv will be created in the examples directory.
3. Each product object constitutes a single row within the csv file.
