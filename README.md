# SmartphoneDiscover

SmartphoneDiscover is a website where you can find a perfect smartphone for you. You don't need to be an expert in mobile to do it.

## Pages

### Home
#### IntermediateSearch

Here you have 4 options (slide bar): **performance**, **camera**, **battery** and **memory**.

`Performance is based on AnTuTu Benchmarks (v8).`

#### AdvancedSearch

Here you have 12 options to filter: 
**brand**, **device name**, **launch year**, **chipset**, **ram memory**, **internal memory**, **external memory**, **display size**, **main camera**, **selfie camera**, **battery** and **price**.

### Smartphones
#### List

It's a **CRUD** (Create, Read, Update, and Delete).
Here you can see all **smartphones** added in our database.

> **Users** not **logged** can access only the ***read*** option.

#### Form

> This page can **only** be accessed if you're **logged in**.

You can add a smartphone here with the same options you have in ***AdvancedSearch*** page (excluding the **antutu** field).

You can access this page with 3 ways:

- By **adding** a smartphone 
- By **modifying** a smartphone
- By **viewing** a smartphone

> In ***view*** mode all **fields** are disabled.

### User

#### Login

A simple ***login*** page. The fields are: **email** and **password**.
You have a option to **remember your login** and a option if you **forgot your password**.

#### Register

A simple ***sing-up*** page. There are 4 fields: **name**, **email**, **password** and **confirm password**.

There are some validations:

- The **email** field must be a valid email.
- The **name** can't have more than **255** characters.
- The **password** must have at least **8** characters.
- The **confirm password** field must be same as **password**.
