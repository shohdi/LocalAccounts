using LocalAccounts.Models.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace LocalAccounts.Models.Repo
{
   
        /// <summary>
        /// Repository
        /// </summary>
        public partial interface IRepository<T> where T : BaseEntity
        {
            T GetById(object id);
            bool Insert(T entity);
            bool Update(T entity);
            bool Delete(T entity);
            IQueryable<T> Table { get; }

        
    }
}